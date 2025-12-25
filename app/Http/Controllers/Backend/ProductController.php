<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Models\Warehouse;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    public function AllCategory()
    {
        $categories = ProductCategory::latest()->get();
        return view('admin.backend.category.all_category', compact('categories'));
    }

    public function StoreCategory(Request $request)
    {
        ProductCategory::insert([
            'category_name' => $request->name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);

        $notification = array(
            'message' => 'Produkt-Kategorie wurde erstellt',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
        $category = ProductCategory::find($id);
        return response()->json($category);
    }

    public function UpdateCategory(Request $request)
    {
        $id = $request->id;

        ProductCategory::find($id)->update([
            'category_name' => $request->name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->name)),
        ]);

        $notification = array(
            'message' => 'Produkt-Kategorie wurde bearbeitet',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteCategory($id)
    {
        ProductCategory::find($id)->delete();

        $notification = array(
            'message' => 'Produkt-Kategorie wurde gelöscht',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /// Product Methods


    public function AllProduct()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.backend.product.product_list', compact('products'));
    }

    public function AddProduct()
    {
        $categories = ProductCategory::all();
        $brands     = Brand::all();
        $suppliers  = Supplier::all();
        $warehouses = Warehouse::all();

        return view('admin.backend.product.add_product', compact('categories', 'brands', 'suppliers', 'warehouses'));
    }

    public function StoreProduct(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'code' => $request->code,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'price' => $request->price,
            'stock_alert' => $request->stock_alert,
            'note' => $request->note,
            'product_qty' => $request->product_qty,
            'status' => $request->status,
            'created_at' => now()
        ]);

        $product_id = $product->id;

        /// Multiple Image Upload
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $manager = new ImageManager(new Driver);
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $imgs = $manager->read($image);
                $imgs->resize(150, 150)->save(public_path('upload/product_img/' . $name_gen));
                $save_url = 'upload/product_img/' . $name_gen;

                ProductImage::create([
                    'product_id' => $product_id,
                    'image' => $save_url,
                ]);
            }
        }

        $notification = array(
            'message' => 'Produkt wurde gespeichert',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function EditProduct($id){
        $editData = Product::find($id);
        $categories = ProductCategory::all();
        $brands     = Brand::all();
        $suppliers  = Supplier::all();
        $warehouses = Warehouse::all();
        $multiImg = ProductImage::where('product_id', $id)->get();

        return view('admin.backend.product.edit_product', compact('categories', 'brands', 'suppliers', 'warehouses', 'editData', 'multiImg'));
    }

    public function UpdateProduct(Request $request){
        $product_id = $request->id;
        $product = Product::findOrFail($product_id);
        
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->warehouse_id = $request->warehouse_id;
        $product->supplier_id = $request->supplier_id;
        $product->price = $request->price;
        $product->stock_alert = $request->stock_alert;
        $product->note = $request->note;
        $product->product_qty = $request->product_qty;
        $product->status = $request->status;
        $product->save();

        /// Multiple Image Upload
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $manager = new ImageManager(new Driver);
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $imgs = $manager->read($image);
                $imgs->resize(150, 150)->save(public_path('upload/product_img/' . $name_gen));
                $save_url = 'upload/product_img/' . $name_gen;
                
                $product->images()->create([
                    'image' => 'upload/product_img/' . $name_gen,
                ]);
            }
        }

        if ($request->has('remove_image')) {
            foreach ($request->remove_image as $removeImageId) {
                $img = ProductImage::find($removeImageId);
                if ($img) { 
                    if (file_exists(public_path($img->exif_imagetype))) {
                        unlink(public_path($img->image));
                    }
                    $img->delete();
                }
            }
        }

        $notification = array(
            'message' => 'Produkt wurde aktualisiert',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function DeleteProduct($id){
        $product = Product::findOrFail($id);

        $images = ProductImage::where('product_id', $id)->get();
        foreach($images as $img){
            $imagePath = public_path($img->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete image from records
        ProductImage::where('product_id', $id)->delete();

        // Delete product
        $product->delete();

        $notification = array(
            'message' => 'Produkt wurde gelöscht',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DetailsProduct($id){
        $product = Product::findOrFail($id);
        return view('admin.backend.product.details_product', compact('product'));
    }
}

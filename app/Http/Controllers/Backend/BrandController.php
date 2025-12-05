<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->get();
        return view('admin.backend.brand.all_brands', compact('brands'));
    }

    public function AddBrand()
    {
        return view('admin.backend.brand.add_brand');
    }

    public function StoreBrand(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver);
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(200, 300)->save(public_path('upload/brand/' . $name_gen));
            $save_url = 'upload/brand/' . $name_gen;

            Brand::create([
                'name' => $request->name,
                'image' => $save_url
            ]);
        }

        $notification = array(
            'message' => 'Marke wurde hinzugefügt',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    }

    public function EditBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.backend.brand.edit_brand', compact('brand'));
    }

    public function UpdateBrand(Request $request)
    {
        $id = $request->id;
        $brand = Brand::find($id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver);
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(200, 300)->save(public_path('upload/brand/' . $name_gen));
            $save_url = 'upload/brand/' . $name_gen;

            if (file_exists(public_path($brand->image))) {
                @unlink(public_path($brand->image));
            }

            Brand::find($id)->update([
                'name' => $request->name,
                'image' => $save_url
            ]);
        } else {
            Brand::find($id)->update([
                'name' => $request->name
            ]);
        }

        $notification = array(
            'message' => 'Marke wurde bearbeitet',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    }
}

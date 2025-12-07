<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

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
}

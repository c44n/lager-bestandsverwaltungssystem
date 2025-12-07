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

    public function StoreCategory(Request $request) {
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
}

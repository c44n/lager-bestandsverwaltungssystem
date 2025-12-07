<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function AllCategory(){
        $categories = ProductCategory::latest()->get();
        return view('admin.backend.category.all_category', compact('categories'));
    }
}

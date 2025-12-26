<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PurchaseController extends Controller
{
    public function index(): View
    {
        $purchases = Purchase::latest()->paginate(10);
        return view('admin.backend.purchases.index', compact('purchases'));
    }

    public function create(): View
{
    // Hier holst du oft Daten für Dropdowns (z.B. Lieferanten)
    $suppliers = Supplier::all();
    $warehouses = Warehouse::all();

    return view('admin.backend.purchases.create', compact('suppliers', 'warehouses'));
}
}

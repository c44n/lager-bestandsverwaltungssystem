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
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
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
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();

        return view('admin.backend.purchases.create', compact('suppliers', 'warehouses'));
    }

    public function searchProducts(Request $request): JsonResponse
    {
        // 1. Validierung (Optional aber empfohlen)
        $query = $request->string('query')->trim();
        $warehouseId = $request->integer('warehouse_id');

        // 2. Abfrage aufbauen
        $products = Product::query()
            ->select(['id', 'name', 'code', 'price', 'product_qty'])
            ->when($query->isNotEmpty(), function ($q) use ($query) {
                $q->where(function ($sub) use ($query) {
                    $sub->where('name', 'like', "%{$query}%")
                        ->orWhere('code', 'like', "%{$query}%");
                });
            })
            ->when($warehouseId, function ($q) use ($warehouseId) {
                $q->where('warehouse_id', $warehouseId);
            })
            ->limit(20)
            ->get();

        return response()->json($products);
    }
}

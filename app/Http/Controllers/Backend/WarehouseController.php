<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class WarehouseController extends Controller
{
    public function AllWarehouse()
    {
        $warehouse = Warehouse::latest()->get();
        return view('admin.backend.warehouse.all_warehouse', compact('warehouse'));
    }

    public function AddWarehouse()
    {
        return view('admin.backend.warehouse.add_warehouse');
    }

    public function StoreWarehouse(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:warehouses,email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Warehouse::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
        ]);

        $notification = array(
            'message' => 'Lager wurde hinzugefügt',
            'alert-type' => 'success'
        );

        return redirect()->route('all.warehouse')->with($notification);
    }

    public function EditWarehouse($id)
    {
        $warehouse = Warehouse::find($id);
        return view('admin.backend.warehouse.edit_warehouse', compact('warehouse'));
    }

    public function UpdateWarehouse(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:warehouses,email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Warehouse::find($id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
        ]);

        $notification = array(
            'message' => 'Lager wurde erfolgreich bearbeitet',
            'alert-type' => 'success'
        );

        return redirect()->route('all.warehouse')->with($notification);
    }

    public function DeleteWarehouse($id){
        Warehouse::find($id)->delete();

        $notification = array(
            'message' => 'Lager wurde gelöscht',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

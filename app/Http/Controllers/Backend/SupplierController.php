<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SupplierController extends Controller
{
    public function AllSupplier()
    {
        $supplier = Supplier::latest()->get();
        return view('admin.backend.supplier.all_supplier', compact('supplier'));
    }

    public function AddSupplier()
    {
        return view('admin.backend.supplier.add_supplier');
    }

    public function StoreSupplier(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Supplier::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
        ]);

        $notification = array(
            'message' => 'Lieferant wurde hinzugefügt',
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);
    }
    
    public function EditSupplier($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.backend.supplier.edit_supplier', compact('supplier'));
    }

    public function UpdateSupplier(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:warehouses,email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Supplier::find($id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
        ]);

        $notification = array(
            'message' => 'Lieferant wurde erfolgreich bearbeitet',
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);
    }

    public function DeleteSupplier($id){
        Supplier::find($id)->delete();

        $notification = array(
            'message' => 'Lieferant wurde gelöscht',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function AllCustomer(){
        $customer = Customer::latest()->get();
        return view('admin.backend.customer.all_customer', compact('customer'));
    }

    public function AddCustomer()
    {
        return view('admin.backend.customer.add_customer');
    }

    public function StoreCustomer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
        ]);

        $notification = array(
            'message' => 'Kunde wurde hinzugefügt',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customer')->with($notification);
    }

    public function EditCustomer($id)
    {
        $customer = Customer::find($id);
        return view('admin.backend.customer.edit_customer', compact('customer'));
    }

    public function UpdateCustomer(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:warehouses,email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Customer::find($id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
        ]);

        $notification = array(
            'message' => 'Kunde wurde erfolgreich bearbeitet',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customer')->with($notification);
    }

    public function DeleteCustomer($id){
        Customer::find($id)->delete();

        $notification = array(
            'message' => 'Kunde wurde gelöscht',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

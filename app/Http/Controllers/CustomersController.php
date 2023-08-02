<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at')->get();
        $success = session('success');
        return view('customers.index', [
            'customers' => $customers,
            'success' => $success
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $all = $request->all();
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $path = Customer::uploadCoverImage($file);
            $all['image_path'] = $path;
        }
        $customer = Customer::create($all);
        return redirect()->route('customers.index')
            ->with('success', 'Customer created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $old = $customer->image_path;
        $all = $request->all();

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $path = Customer::uploadCoverImage($file);
            $all['image_path'] = $path;
        }

        $customer->update($all);

        if ($old && $old != $customer->image_path) {
            Customer::deleteCoverImage($old);
        }
        return redirect(route('customers.index'))
            ->with('success', 'Customer updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        Customer::deleteCoverImage($customer->image_path);

        return redirect(route('customers.index'))
            ->with('success', 'Customer deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\StoreCustomerRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CustomerResource::collection (Customers::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customers::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);
        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customer)
    {
        return new CustomerResource ($customer);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customers $customer)
    {
        $customer->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customer)
    {
        return $customer->delete();
    }
}

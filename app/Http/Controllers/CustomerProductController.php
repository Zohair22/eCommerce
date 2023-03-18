<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerProductRequest;
use App\Http\Requests\UpdateCustomerProductRequest;
use App\Models\CustomerProduct;

class CustomerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerProduct $customerProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerProduct $customerProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerProductRequest $request, CustomerProduct $customerProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerProduct $customerProduct)
    {
        //
    }
}

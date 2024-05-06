<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $customer = Customer::with('orders')->get();
        // $customer = Customer::with('latestOrder')->get();
        // $customer = Customer::with('oldestOrder')->find(2);
        
        // $customer = Customer::with('largestOrder')->get();
        // $customer = Customer::with('smallestOrder')->get();
        // $customer = Customer::with('largestOrder')->find(2);

        // $customer = Customer::with('orders')->with('latestOrder')->get();
        // $customer = Customer::with('orders')->with('oldestOrder')->get();
        // $customer = Customer::with('orders')->with('largestOrder')->get();
        $customer = Customer::with('orders')->with('smallestOrder')->get();
        return $customer;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

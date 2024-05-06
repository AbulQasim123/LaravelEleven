<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $admins = Admin::find(1);
        // $admins = Admin::get();
        // return $admins->roles;

        // foreach ($admins->roles as $role) {
        //     echo $role->role_name . ' / ';
        // }

        // foreach ($admins as $admin) {
        //     echo $admin->name . '<br>';
        //     echo $admin->email . '<br>';
        //     foreach ($admin->roles as $role) {
        //         echo $role->role_name . ' / ';
        //     }
        //     echo "<hr>";
        // }

        // $admin = Admin::with('company')->with('phoneNumber')->get();
        // $admin = Admin::with('company')->with('phoneNumber')->find(2);
        // echo $admin->name . '<br>';
        // echo $admin->company->company_name . '<br>';
        // echo $admin->phoneNumber->number . '<br>';

        $admins = Admin::with('company')->with('phoneNumber')->get();
        foreach ($admins as $admin) {
            echo $admin->name . '<br>';
            echo $admin->company->company_name . '<br>';
            echo $admin->phoneNumber->number . '<br>';
            echo "<hr>";
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Creating Role diff 2 way

        // $admin = Admin::find(2);
        // $admin->roles()->attach(2);

        // $admin = Admin::find(3);
        // $roles = [2, 3, 4];
        // $admin->roles()->attach($roles);

        // $admin = Admin::find(3);
        // $admin->roles()->detach(3);

        $admin = Admin::find(2);
        $roles = [3];
        $admin->roles()->sync($roles);  // sync method can do update or create
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

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $student = Student::all();
        // $student = Student::with('contact')->get();
        // $student = Student::with('contact:id,name')->find(2);
        // $student = Student::with('contact')->where('gender', 'male')->get();
        // $student = Student::where('gender', 'female')->withWhereHas('contact', function($query){
        //     $query->where('city', 'Hankberg'); // here is we are querying to reverse the relationship
        // })->get();
        $student = Student::where('gender', 'female')->whereHas('contact', function($query){
            $query->where('city', 'Hankberg'); // here is we are querying to reverse the relationship
        })->get();
        return $student;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::create([
            'name' => 'John Doe',
            'age' => 25,
            'gender' => 'male',
        ]);

        $student->contact()->create([
            'email' => 'wJkOY@example.com',
            'phone' => '1234567890',
            'address' => '#123 Main St',
            'city' => 'Delhi',
        ]);
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

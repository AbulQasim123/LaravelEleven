<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class DynamicAddRemoveFieldController extends Controller
{
    public function index()
    {
        return view("add-remove-multiple-input-fields");
    }
    public function store(Request $request)
    {
        $request->validate([
            'moreFields.*.title' => 'required'
        ]);

        foreach ($request->moreFields as $key => $value) {
            Todo::create($value);
        }

        return back()->with('success', 'Todos Has Been Created Successfully.');
    }
}

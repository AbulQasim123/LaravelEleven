<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class jqueryAutoComplete extends Controller
{
    public function index()
    {
        return view('search-form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchAutocomplete(Request $request)
    {
        $res = User::select("name")
            ->where("name", "LIKE", "%{$request->term}%")
            ->get();

        return response()->json($res);
    }
}

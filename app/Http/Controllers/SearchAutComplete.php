<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchAutComplete extends Controller
{
    public function index()
    {
        return view('search');
    }
    public function searchAutocomplete(Request $request)
    {
        $search = $request->get('term');
        $result = User::where('name', 'LIKE', '%' . $search . '%')->pluck('name');
        return response()->json($result);
    }
}

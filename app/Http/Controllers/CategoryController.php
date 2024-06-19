<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categoris = Category::where('parent_id', 0)->get();
        return view('category', ["categoris" => $categoris]);
    }
    public function subCat(Request $request)
    {
        $parent_id = $request->cat_id;
        $subcategories = Category::where('id', $parent_id)
            ->with(['subcategories' => function ($query) {
                $query->select('id', 'name', 'parent_id');
            }])
            ->select('id', 'name', 'parent_id')
            ->get();

        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
}

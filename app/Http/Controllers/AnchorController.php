<?php

namespace App\Http\Controllers;

use App\Models\Anchor;
use Illuminate\Http\Request;

class AnchorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $anchor = Anchor::find(1);
        // $anchor = Anchor::with('news')->find(1);
        // $anchor = Anchor::with('news')->get();
        // $anchor = Anchor::with('news')->with('country')->get();
        // $anchor = Anchor::with('news')->with('country')->find(1);
        // return $anchor;

        // one to one polymorphic relationship
        // $anchor = Anchor::with('image')->find(1);
        // return $anchor;

        // $anchor = Anchor::find(1);
        // return $anchor->image;
        // $anchor = Anchor::with('image')->with('country')->with('news')->get();
        // $anchor = Anchor::with(['image','country','news'])->get();
        // $anchor = Anchor::with('image')->get();
        // return $anchor;


        // Laravel Quary Scope
        // $anchor = Anchor::active()
        //     ->with('news')
        //     ->whereStatus(1)
        //     ->where('country_id', 1)
        //     ->get();

        $anchor = Anchor::active()
            ->sort()
            ->get();
        return $anchor;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anchor = Anchor::find(3);
        return $anchor->image()->create([
            'url' => 'images/users/image3.png',
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


    // Inside controller file when using Global Scope
    // Anchor::withoutGlobalScope(AnchorScope::class);
    // Anchor::withoutGlobalScope('userdetails'::class)->get();
    // Anchor::withoutGlobalScope([
    //     fistScope::class,
    //     secondScope::class,
    // ])->get();
    // Anchor::withoutGlobalScope()->get();
}

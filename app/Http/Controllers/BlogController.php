<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $blog = Blog::with('comment')->find(4);
        // $blog = Blog::has('comment')->with('comment')->get();
        // $blog = Blog::doesntHave('comment')->get();
        // $blog = Blog::with('latestComment')->find(4);
        // $blog = Blog::with('latestComment')->get();
        // $blog = Blog::with('oldestComment')->find(4);
        // $blog = Blog::with('oldestComment')->get();
        // $blog = Blog::with('mostComment')->get();
        // $blog = Blog::with('mostComment')->find(4);
        // $blog = Blog::with('leastComment')->get();
        // $blog = Blog::with('leastComment')->find(4);
        // return $blog;

        $blog = Blog::find(4);
        // $mostLikes = $blog->mostLikes;
        $mostLikes = $blog->leastLikes;
        return $mostLikes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $blog = Blog::create([
        //     'title' => 'Business Innovation',
        //     'desription' => 'Leading tech company unveils plans for ambitious space exploration project, aiming to establish permanent human settlement on Mars within the next decade, marking a new chapter in space exploration.'
        // ]);

        $blog = Blog::find(4);
        return $blog->comment()->create([
            'comment_text' => 'This is about besiness innovative Blog'
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

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PaymentService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PaymentService $service)
    {
        // dd($service->process());
        // // dd($service);
        // dd(app());

        // $posts = Post::all();
        // $posts = Post::with('user')->find(6);
        // $posts = Post::with('user')->get();
        // return $posts;

        // foreach ($posts as $value) {
        //     echo "<div style='border: 1px solid black; margin: 0 0 10px'>
        //         <h3>Title: $value->title</h3>
        //         <h3>Description: $value->description</h3>
        //         <h3>User Name: {$value->user->name}</h3>
        //         <h3>User Email: {$value->user->email}</h3>
        //     </div>";
        // }

        // $posts = Post::withWhereHas('user', fn($q) => $q->where('name','Therese Renner DDS'))->find(6);
        // $posts = Post::withWhereHas('user', fn($q) => $q->where('name','Therese Renner DDS')->orWhere('name','Julian Rice'))->get();
        // $posts = Post::withWhereHas('user', function($query){
        //     $query->where('name','Therese Renner DDS');
        // })->find(6);

        // $users = User::where('name','Elise Hoeger')->get();
        // $posts = Post::whereBelongsTo($users)->get();


        // return $posts;
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

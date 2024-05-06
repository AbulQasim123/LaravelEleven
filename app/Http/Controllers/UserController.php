<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all()
        // $users = User::with('post')->get();
        // $users = User::with('post')->find(10);
        // $users = User::find(10);
        // $post = $users->post;

        // $users = User::doesntHave('post')->get();
        // $users = User::has('post')->get();
        // $users = User::has('post')->with('post')->get();
        // $users = User::has('post', '>=', 3)->with('post')->get();
        // $users = User::withCount('post')->get();
        $users = User::select('name', 'email')->withCount('post')->get();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // First Way
        // $post = new Post([
        //     'title' => 'foo foo foo foo ',
        //     'description'  => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
        // ]);
        // $user = User::find('15');
        // $user->post()->save($post);


        // Second Way

        // $postData = [
        //     [
        //         'title' => 'dummy one',
        //         'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
        //     ],
        //     [
        //         'title' => 'dummy two',
        //         'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
        //     ],
        // ];

        // $user = User::find('15');
        // // $user->post()->createMany($postData);
        // foreach ($postData as $data) {
        //     $post = new Post($data);
        //     $user->post()->save($post);
        // }

        // Third Way
        // $user = User::find(15);
        // $user->post()->create([
        //     'title' => 'dummy one',
        //     'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
        // ]);

        // Fourth Way
        $user = User::find(15);
        $user->post()->createMany([
            [
                'title' => 'dummy three',
                'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
            ],
            [
                'title' => 'dummy four',
                'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
            ],
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

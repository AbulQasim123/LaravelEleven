<?php

namespace App\Http\Controllers;

use App\Models\Vedio;
use Illuminate\Http\Request;

class VedioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $video = Vedio::with('comment')->find(1);
        // $video = Vedio::with('comment')->get();
        // $video = Vedio::has('comment')->with('comment')->get();
        // $video = Vedio::doesntHave('comment')->get();

        // $video = Vedio::with('latestComment')->find(1);
        // $video = Vedio::with('latestComment')->get();
        // $video = Vedio::with('oldestComment')->find(1);
        // $video = Vedio::with('oldestComment')->get();
        // $video = Vedio::with('mostLikes')->get();
        // $video = Vedio::with('mostLikes')->find(1);
        // $video = Vedio::with('leastLikes')->get();
        // $video = Vedio::with('leastLikes')->find(1);

        $video = Vedio::find(1);
        // $mostLikes = $video->mostLikes;
        $mostLikes = $video->leastLikes;
        return $mostLikes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $video = Vedio::find(1);
        return $video->comment()->createMany([
            [
                'comment_text' => 'Yahoo sir. Ap project kitni video ka bad start krwaya gy',
            ],
            [
                'comment_text' => 'make video on Point of Sales system project on Laravel',
            ],
            [
                'comment_text' => 'greate sir!!! cron job par video banao plz in depth me',
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

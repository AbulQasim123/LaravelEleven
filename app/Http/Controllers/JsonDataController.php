<?php

namespace App\Http\Controllers;

use App\Models\JsonData;
use Illuminate\Http\Request;

class JsonDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jsonData = JsonData::find(4);
        // $jsonData = JsonData::orderBy('json_data->name')->get();
        // return $jsonData->json_data['address']['city'];
        // $jsonData = JsonData::where('json_data->name', 'AbulQasim')->get();
        // $jsonData = JsonData::whereJsonContains('json_data->name', 'AbulQasim')->get();
        $jsonData = JsonData::whereJsonLength('json_data->name', 1)->get();
        return $jsonData;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // First way
        // $json = new JsonData;
        // $json->json_data = [
        //     'name' => 'AbulQasim',
        //     'email' => 'email@gmail.com',
        //     'contact' => '8596748574'
        // ];
        // $json->save();

        // Second way
        // return $result = JsonData::create([
        //     'json_data' => [
        //         'name' => 'AbulQasim',
        //         'email' => 'email@gmail.com',
        //         'age' => '21',
        //         'contact' => '8596748574',
        //     ]
        // ]);

        // Third way
        // return $result = JsonData::create([
        //     'json_data' => [
        //         'name' => 'AbulQasim',
        //         'email' => 'email@gmail.com',
        //         'age' => '21',
        //         'contact' => '8596748574',
        //         'address' => [
        //             'street' => '#213 KK Road',
        //             'city' => 'Bhiwandi',
        //             'country' => 'India'
        //         ]
        //     ]
        // ]);

        // update json data
        // return $jsonData = JsonData::where('id', 4)->update([
        //     'json_data->name' => 'AbulQasim Ansari',
        // ]);
        // return $jsonData = JsonData::where('id', 4)->update([
        //     'json_data->address->city' => 'Mumbai',
        // ]);

        // $jsonData = JsonData::find(4);
        // $jsonData->json_data['name'] = "AbulQasim";
        // $jsonData->save();

        // Delete json data
        // $jsonData = JsonData::find(4);
        // $jsonData->json_data = collect($jsonData->json_data)->forget('email');
        // $jsonData->save();

        // insert new key value
        return $jsonData = JsonData::where('id', 4)->update([
            'json_data->email' => 'qasim@gmail.com',
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

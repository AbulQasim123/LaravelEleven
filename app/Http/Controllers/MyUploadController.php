<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyUploadController extends Controller
{
    public function index()
    {
        return view('upload-form');
    }
    public function multipleUpload(Request $request)
    {

        $validateImageData = $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = $file->store('public/upload-multiple-images');
                $name = $file->getClientOriginalName();
            }
        }

        return redirect('my-form')->with('status', 'Images has been uploaded');
    }
}

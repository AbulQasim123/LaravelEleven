<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadPreviewController extends Controller
{
    public function previewImages()
    {
        return view('image-upload-preview');
    }
    public function uploadMultipleImages(Request $request)
    {

        $validateImageData = $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = $file->store('public/images-preview');
                $name = $file->getClientOriginalName();
            }
        }

        return redirect('preview-images')->with('status', 'Images has been uploaded successfully');
    }
}

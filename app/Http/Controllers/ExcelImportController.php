<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function showForm()
    {
        return view('import');
    }


    public function import(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required',
        ]);
        Excel::import(new UsersImport, $request->file('file'));

        return redirect('import')->with('status', 'File has been imported');
    }
}

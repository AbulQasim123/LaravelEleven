<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MessageController extends Controller
{
    public function success()
    {
        Alert::success('Success Message', 'You have successfully completed an action.');
        return view('messages');
    }

    public function warning()
    {
        Alert::warning('Warning Message', 'This is a warning message.');
        return view('messages');
    }

    public function error()
    {
        Alert::error('Error Message', 'An error occurred.');
        return view('messages');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HelloController extends Controller
{
    public function sendHelloMail()
    {
        $title = 'Hello Mail from AbulQasim Ansari';
        $body = 'This is the first email to send in laravel 11 application from AbulQasim';

        Mail::to('qasim.cloudzurf@gmail.com')->send(new HelloMail($title, $body));

        return "Email has been sent successfully!";
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;

class PostController extends Controller
{
    public function index(PaymentService $service)
    {
        dd($service->process());
        // dd($service);
        dd(app());
    }
}

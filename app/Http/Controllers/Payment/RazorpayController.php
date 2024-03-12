<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class RazorpayController extends Controller
{
    public function index($price){
        return view("client.razorpay");
    }
}

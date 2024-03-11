<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/');
    }
    public function user()
    {
        return view('userDashboard');
    }
    public function admin()
    {
        return view('adminDashboard');
    }

    public function checkout()
    {
        return view('checkout');
    }
    public function cart()
    {
        return view('layouts.cart');
    }
    public function shop()
    {
        return view('shop');
    }


}

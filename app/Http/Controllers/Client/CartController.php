<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Address;
use App\Models\Cart;


class CartController extends Controller
{
    public function index(){
        $carts=Cart::all();
        return view("client.cart", compact("carts"));
    }

    public function view_checkout(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $address = Address::where('user_id', Auth::user()->id)->latest()->first();
        return view ('client.checkout', compact('carts', 'address'));
    }
}

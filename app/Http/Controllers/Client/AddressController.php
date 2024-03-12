<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Address;

class AddressController extends Controller
{
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $address = new Address;
        $address->user_id = $user_id;
        $address->name = $request->name;
        $address->street = $request->street;
        $address->phone = $request->phone;
        $address->alt_phone = $request->alt_phone;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->pincode = $request->pincode;
        $address->save();
        return redirect()->back();
    }
}

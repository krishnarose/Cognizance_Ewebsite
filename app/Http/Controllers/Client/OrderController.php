<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Razorpay\Api\Api;
use Session;
use Exception;

use App\Models\Cart;
use App\Models\Address;
use App\Models\Order;


class OrderController extends Controller
{
    public function store(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
            } catch (Exception $e) {
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $address = Address::where('user_id', Auth::user()->id)->latest()->first();
        foreach($carts as $item){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->address_id = $address->id;
            $order->product_id = $item->id;
            $order->title = $item->title;
            $order->quantity = $item->quantity;
            $order->image = $item->image;
            $order->price = $item->price;
            $order->payment_status = "Paid";
            $order->delivery_status = "Not Shipped";
            $order->save();
            $item->delete();
        }

        Session::put('success', 'Payment successful');
        return redirect('/orders')->with('success', 'Payment successful');
    }
}

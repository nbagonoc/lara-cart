<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class orderController extends Controller
{
    public function customerOrders(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders.customerOrders')->with('orders',$orders);
    }
}

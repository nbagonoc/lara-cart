<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function index(){
        return view('orders.manage');
    }
    public function customerOrders(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders.customerOrders')->with('orders',$orders);
    }
}

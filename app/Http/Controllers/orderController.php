<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders.manage')->with('orders',$orders);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $order->cart = unserialize($order->cart);

        return view('orders.show')->with('order',$order);
    }

    public function customerOrders()
    {
        $orders = Auth::user()->orders;

        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('orders.customerOrders')->with('orders',$orders);
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $order->cart = unserialize($order->cart);

        return view('orders.edit')->with('order', $order);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        //redirect after update
        return redirect('/orders/manage/show/'.$id)->with('success','Successfully updated order status');
    }
}

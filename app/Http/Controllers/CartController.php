<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use Auth;
use App\Product;
use App\Cart;
use App\Order;

class CartController extends Controller
{
    public function cart(){
        if(!Session::has('cart')){
            return view('pages.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.cart')->with(['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function addToCart(Request $request, $id){
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));
        return redirect('/');
    }

    public function addCart(Request $request, $id){
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart',$cart);
        return redirect('/cart')->with('success','Sucessfully added 1 item to cart');
    }

    public function reduceCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce($id);

        if(count($cart->items)>0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect('/cart')->with('success','Sucessfully removed 1 item from cart');
    }

    public function removeFromCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);

        if(count($cart->items)>0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect('/cart')->with('success','Sucessfully removed product from cart');
    }

    public function clear(){
        Session::forget('cart');
        return redirect('/cart')->with('success','Sucessfully removed all items from cart');
    }

    public function checkout(){
        if(!Session::has('cart')){
            return redirect('pages.cart')->with('error','Cart is empty. Please add products to cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('pages.checkout')->with('total',$total);
    }

    public function checkoutProcess(){
        // dd(request()->all());
        if(!Session::has('cart')){
            return redirect('pages.cart')->with('error','Cart is empty. Please add products to cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_8UbzXdHrIfLfakS8biUEipYf');
        $token = request()->stripeToken;
        try{
            $charge = Charge::create([
                'amount' => $cart->totalPrice*100,
                'currency' => 'usd',
                'source' => request()->stripeToken
            ]);

            $order = new Order();
            $order->cart = serialize($cart);
            $order->payment_id = $charge->id;
            $order->email = request()->stripeEmail;
            $order->name = request()->stripeShippingName;
            $order->address = request()->stripeShippingAddressLine1.', '.request()->stripeShippingAddressCity.', '.request()->stripeShippingAddressZip.', '.request()->stripeShippingAddressCountry;
            // add order to database
            Auth::user()->orders()->save($order);
            // clear cart
            Session::forget('cart');
            return redirect('/cart')->with('success','Payment successful');
        }
        catch(\Exception $error){
            return redirect('/cart')->with('error','Payment not successful');
        }
    }
}

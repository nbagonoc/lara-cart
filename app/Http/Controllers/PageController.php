<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;

class PageController extends Controller
{
    public function home(){
        // $products = Product::all();
        $products = Product::orderBy('created_at','dsc')->paginate(6);
        return view('pages.home')->with('products',$products);
    }

    public function shopByCategory($category){
        // dd($products);
        // $products = Product::where('category',$category)->get();
        $products = Product::where('category',$category)->orderBy('created_at','dsc')->paginate(6);
        return view('pages.shop')->with('products',$products);
    }

    public function search(){
        $q = Input::get('q');
        $products = Product::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'category', 'LIKE', '%' . $q . '%' )->paginate (8)->setPath ( '' );
        $products->appends(array('q' => Input::get('q')));
    
        return view('pages.search')->with('products',$products);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}

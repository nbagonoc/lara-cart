<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function home(){
        $products = Product::all();
        return view('pages.home')->with('products',$products);
    }
}

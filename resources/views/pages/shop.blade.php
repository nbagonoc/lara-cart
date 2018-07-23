@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.shopSidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            @if(count($products)>=1)
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-3">
                                <a href="/product/{{$product->id}}">
                                    <div class="card-image rounded-top" style="
                                    background: url('/storage/imgPath/{{$product->imgPath}}') center center;
                                    "></div>
                                </a>
                                <div class="card-body">
                                    <a href="/product/{{$product->id}}" class="text-dark"><h6 class="text-capitalize font-weight-light mb-0">{{$product->name}}</h6></a>
                                    <span class="text-capitalize text-secondary small">{{$product->category}}</span>
                                    <h5 class="text-success">${{number_format((float)$product->price,2,'.','')}}</h5>
                                    @guest
                                        <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-block mt-2">Add to Cart</a>
                                    @endguest
                                    @auth
                                        @if(Auth::user()->role=='user')
                                            <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-block mt-2">Add to Cart</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        {{$products->links()}}
                    </div>
                </div>
            @else
                <span class="">No products in this category</span>
            @endif
        </div>
    </div>
@endsection

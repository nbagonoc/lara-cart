@extends('layouts.app')

@section('content')
    @if($product)
        <div class="row">
                <div class="col-md-6 order-md-2 mb-3">
                    <div class="card">
                        <img src="/storage/imgPath/{{$product->imgPath}}" alt="{{$product->name}}" class="w-100">
                    </div>
                </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-capitalize mb-0">{{$product->name}}</h5>
                        <h6 class="text-capitalize text-secondary small">{{$product->category}}</h6>
                        <h4 class="mb-0 text-success">${{number_format((float)$product->price,2,'.','')}}</h4>
                        <hr>
                        {{$product->description}}
                        <hr>
                        @guest
                            <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-sm">Add to Cart</a>
                        @endguest
                        @auth
                            @if(Auth::user()->role=='user')
                                <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-sm">Add to Cart</a>
                            @else
                                <a href="/products/manage/delete/{{$product->id}}" class="btn btn-outline-danger btn-sm">Remove</a>
                            @endif
                        @endauth
                        <a href="{{ URL::previous() }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        No product found
    @endif
@endsection
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>
                <div class="card-body">
                    @if(Session::has('cart'))
                        <table class="table border-bottom">
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="p-0">
                                            <a href="/product/{{$product['item']['id']}}">
                                                <div class="product-image" style="
                                                    background: url('/storage/imgPath/{{$product["item"]["imgPath"]}}') center center;
                                                "></div>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/product/{{$product['item']['id']}}" class="text-dark">
                                                <span class="text-capitalize">{{$product['item']['name']}}</span>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="/reduce-cart/{{$product['item']['id']}}" class="btn btn-success btn-sm">-</a>
                                                <button class="btn btn-outline-success btn-sm">{{$product['qty']}}</button>
                                                <a href="/add-cart/{{$product['item']['id']}}" class="btn btn-success btn-sm">+</a>
                                            </div>
                                            <a href="/remove-from-cart/{{$product['item']['id']}}" class="btn btn-outline-danger btn-sm">Remove</a>
                                        </td>
                                        <td><h3 class="text-success text-right m-0">${{number_format((float)$product['price'],2,'.','')}}</h3></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h3 class="mr-2 text-right">Total: <span class="text-success">${{number_format((float)$totalPrice,2,'.','')}}</span></h3>
                        <hr>
                        <a href="/" class="btn btn-outline-success btn-sm float-left mr-2">Continue Shopping</a>
                        <a href="/clear" class="btn btn-outline-danger btn-sm float-left">Clear Cart</a>
                        <a href="/checkout" class="btn btn-outline-success btn-sm float-right">Proceed to Checkout</a>
                    @else
                        No items in cart <a href="/" class="btn btn-outline-success btn-sm">Shop Now</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

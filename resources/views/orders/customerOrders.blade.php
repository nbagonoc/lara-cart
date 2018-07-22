@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Orders</div>
                <div class="card-body">
                        @if(count($orders)>=1)
                            @foreach($orders as $order)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="card-title m-0"><strong>Ref ID:</strong> {{$order->id}}</p>
                                        <p class="card-text m-0"><strong>Ordered on:</strong> {{ date('F d, Y', strtotime($order->created_at))}}</p>
                                        <p class="card-text m-0"><strong>Shipping Address:</strong> {{$order->address}}</p>
                                    <p class="card-text m-0"><strong>Status:</strong> <span class="text-capitalize badge badge-success badge-pill">{{$order->status}}</span></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @foreach($order->cart->items as $item)
                                            <li class="list-group-item">
                                            <a href="/product/{{$item['item']['id']}}" class="text-capitalize text-dark">{{$item['item']['name']}}</a> |
                                                Unit(s): <span class="badge badge-pill badge-success">{{$item['qty']}}</span> |
                                                Price: <span class="badge badge-pill badge-success">${{number_format((float)$item['item']['price'],2,'.','')}}</span>
                                                <span class="float-right">Total unit price: <span class="badge badge-success badge-pill">${{number_format((float)$item['price'],2,'.','')}}</span></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="card-body">
                                        <h5 class="float-left">Toal unit(s): {{$order->cart->totalQty}}</h5>
                                        <h5 class="float-right">Total amount paid: <span class="text-success">${{number_format((float)$order->cart->totalPrice,2,'.','')}}</span></h5>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            No orders <a href="/cart" class="btn btn-outline-success btn-sm">Go to Cart</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection

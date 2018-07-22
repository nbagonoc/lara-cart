@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">View Order</div>
                <div class="card-body">
                    @if($order)
                        <p class="card-title m-0"><strong>Ref ID:</strong> {{$order->id}}</p>
                        <p class="card-text m-0"><strong>Status:</strong> <span class="text-capitalize badge badge-success badge-pill">{{$order->status}}</span></p>
                        <p class="card-text m-0"><strong>Customer Name:</strong> {{$order->user->name}}</p>
                        <p class="card-text m-0"><strong>Shipping Address:</strong> {{$order->address}}</p>
                        <p class="card-text m-0"><strong>Ordered On:</strong> {{ date('F d, Y', strtotime($order->created_at))}}</p>
                        <ul class="list-group list-group-flush my-4">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item px-0">
                                <a href="/product/{{$item['item']['id']}}" class="text-capitalize text-dark">{{$item['item']['name']}}</a> |
                                    Unit(s): <span class="badge badge-pill badge-success">{{$item['qty']}}</span> |
                                    Price: <span class="badge badge-pill badge-success">${{number_format((float)$item['item']['price'],2,'.','')}}</span>
                                    <span class="float-right">Total unit price: <span class="badge badge-success badge-pill">${{number_format((float)$item['price'],2,'.','')}}</span></span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="clearfix">
                            <h5 class="float-left">Toal unit(s): {{$order->cart->totalQty}}</h5>
                            <h5 class="float-right">Total amount paid: <span class="text-success">${{number_format((float)$order->cart->totalPrice,2,'.','')}}</span></h5>
                        </div>
                        <hr>
                        <a href="/orders/manage/edit/{{$order->id}}" class="btn btn-outline-success btn-sm">Update status</a>
                        <a href="/orders/manage" class="btn btn-outline-secondary btn-sm">Back to Orders</a>
                    @else
                        Order not found
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

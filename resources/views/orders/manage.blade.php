@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Manage Orders</div>

                <div class="card-body">
                    @if($orders)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Date ordered</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>pending</td>
                                        <td>{{ date('F d, Y', strtotime($order->created_at))}}</td>
                                        <td>
                                            <a href="/orders/manage/show/{{$order->id}}" class="btn btn-outline-success btn-sm">View</a>
                                            <a href="/orders/manage/edit/{{$order->id}}" class="btn btn-outline-secondary btn-sm">Update Status</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        No Orders
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

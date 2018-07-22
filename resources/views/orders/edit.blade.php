@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Update Order Status</div>
                <div class="card-body">
                    @if($order)
                        <p class="card-title m-0"><strong>Ref ID:</strong> {{$order->id}}</p>
                        <p class="card-text m-0"><strong>Status:</strong> <span class="badge badge-success badge-pill">Pending</span></p>
                        <p class="card-text m-0"><strong>Customer Name:</strong> {{$order->user->name}}</p>
                        <p class="card-text m-0"><strong>Shipping Address:</strong> {{$order->address}}</p>
                        <p class="card-text m-0"><strong>Ordered On:</strong> {{ date('F d, Y', strtotime($order->created_at))}}</p>
                        <hr class="mt-4">
                            {!! Form::open(['action' => ['OrderController@update', $order->id],  'method' => 'POST']) !!}
                                <div class="form-group">
                                    {{Form::label('status', 'Status')}}
                                    {{Form::select('status', ['pending' => 'Pending', 'in-transit' => 'In-Transit', 'received' => 'Received'], $order->status,['class'=>'form-control'])}}
                                </div>
                                {{Form::hidden('_method','PATCH')}}
                                {{Form::submit('Submit', ['class'=>'btn btn-outline-success btn-sm'])}}
                                <a href="{{ URL::previous() }}" class="btn btn-outline-danger btn-sm">Cancel</a>
                            {!! Form::close() !!}
                    @else
                        Order not found
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

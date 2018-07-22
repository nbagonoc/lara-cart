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
                                <a href="#confirmDeleteModal" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
                                {{-- Confirm Delete Modal --}}
                                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confimModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Select "Confirm" below to delete product</div>
                                        <div class="modal-footer d-block">
                                            {!!Form::open(['action'=>['ProductController@destroy', $product->id], 'method'=>'POST', 'class'=>'float-left'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Confirm', ['class'=>'btn btn-outline-success btn-sm'])}}
                                            {!!Form::close()!!}
                                            <button class="btn btn-outline-danger btn-sm float-left" type="button" data-dismiss="modal">Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endauth
                        <a href="/" class="btn btn-outline-secondary btn-sm">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        No product found
    @endif
@endsection
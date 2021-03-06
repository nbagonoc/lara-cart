@extends('layouts.app')

@section('content')
    @if($product)
        <div class="row">
            <div class="col-md-6 order-md-2 mb-3 pl-md-2">
                <div class="card sticky-top">
                    <img src="/storage/imgPath/{{$product->imgPath}}" alt="{{$product->name}}" class="w-100">
                </div>
            </div>
            <div class="col-md-6 pr-md-2">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="text-capitalize mb-0">{{$product->name}}</h5>
                        <a href="/shop/{{$product->category}}" class="text-capitalize text-secondary small">{{$product->category}}</a>
                        <h4 class="mb-0 text-success">${{number_format((float)$product->price,2,'.','')}}</h4>                        
                        <hr>
                        @guest
                            @if($product->status=='available')
                                <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-sm">Add to Cart</a>
                            @else
                                <button type="button" class="btn btn-outline-danger btn-sm" disabled>Out of Stock</button>
                            @endif
                            <a href="/" class="btn btn-outline-info btn-sm">Continue Shopping</a>
                        @endguest
                        @auth
                            @if(Auth::user()->role=='user')
                                @if($product->status=='available')
                                    <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-sm">Add to Cart</a>
                                @else
                                    <button type="button" class="btn btn-outline-danger btn-sm" disabled>Out of Stock</button>
                                @endif
                                <a href="/" class="btn btn-outline-info btn-sm">Continue Shopping</a>
                            @else
                                <a href="/products/manage/edit/{{$product->id}}" class="btn btn-outline-success btn-sm">Edit</a>
                                <a href="#confirmDeleteModal" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
                                <a href="/products/manage" class="btn btn-outline-secondary btn-sm">Manage Products</a>
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
                        <hr>
                        <p class="font-weight-light mb-0">{{$product->description}}</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        @auth
                        {!! Form::open(['action' => ['CommentController@store',$product->id], 'method' => 'POST']) !!}
                            <div class="form-group">
                                {{Form::label('comment', 'Leave a comment')}}
                                {{Form::textarea('body', '', ['id'=>'article-ckeditor','class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Leave a comment'])}}
                            </div>
                            {{Form::submit('Submit', ['class'=>'btn btn-outline-success btn-sm'])}}
                        {!! Form::close() !!}
                        @else
                        <p class="mb-0">Please <a href="http://lara-cart.com/login">Sign-in</a> to leave a comment</p>
                        @endauth
                    </div>
                </div>
                @if(count($comments)>=1)
                    @foreach($comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="mb-0">{{$comment->user->name}}</p>
                                <span class="small text-muted">{{$comment->created_at}}</span>
                                <p class="font-weight-light mb-0">{{$comment->body}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="mb-0">No comments available</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @else
        <p class="mb-0">product not found</p>
    @endif
@endsection
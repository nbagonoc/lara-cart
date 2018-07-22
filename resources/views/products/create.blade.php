@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Create Product</div>
                <div class="card-body">
                    {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Enter the product name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('price', 'Price')}}
                            {{Form::number('price', '', ['class'=>'form-control','placeholder'=>'Enter the price of the product'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('category', 'Category')}}
                            {{Form::select('category', ['phones' => 'Phones', 'tablets' => 'Tablets', 'computers' => 'Computers', 'cameras' => 'Cameras', 'others' => 'Others'],null,['class'=>'form-control', 'placeholder'=>'Select a category'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('status', 'Status')}}
                            {{Form::select('status', ['available' => 'Available', 'outOfStock' => 'Out of Stock'],null,['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Description')}}
                            {{Form::textarea('description', '', ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Enter product description'])}}
                        </div>
                        <div class="form-group">
                            {{Form::file('imgPath')}}
                        </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-outline-success btn-sm'])}}
                        <a href="{{ URL::previous() }}" class="btn btn-outline-danger btn-sm">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
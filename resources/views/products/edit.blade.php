@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Update Product</div>
                <div class="card-body">
                    {!! Form::open(['action' => ['ProductController@update', $product->id],  'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                {{Form::label('name', 'Name')}}
                                {{Form::text('name', $product->name, ['class'=>'form-control', 'placeholder'=>'Product name'])}}
                            </div>
                            <div class="form-group col-md-4">
                                {{Form::label('price', 'Price')}}
                                {{Form::number('price', $product->price, ['class'=>'form-control','placeholder'=>'Product price'])}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {{Form::label('category', 'Category')}}
                                {{Form::select('category', ['phones' => 'Phones', 'tablets' => 'Tablets', 'computers' => 'Computers', 'cameras' => 'Cameras', 'others' => 'Others'], $product->category,['class'=>'form-control', 'placeholder'=>'Select a category'])}}
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('status', 'Status')}}
                                {{Form::select('status', ['available' => 'Available', 'out-of-stock' => 'Out of Stock'], $product->status,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('imgPath', 'Featured image')}}
                            {{Form::file('imgPath',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Description')}}
                            {{Form::textarea('description', $product->description, ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'product description'])}}
                        </div>
                        {{Form::hidden('_method','PATCH')}}
                        {{Form::submit('Submit', ['class'=>'btn btn-outline-success btn-sm'])}}
                        <a href="{{ URL::previous() }}" class="btn btn-outline-danger btn-sm">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
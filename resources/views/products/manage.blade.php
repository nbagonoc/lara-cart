@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Manage Products</div>
                <div class="card-body">
                    @if($products)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="p-0">
                                            <a href="/product/{{$product->id}}">
                                                <div class="product-image" style="
                                                    background: url('/storage/imgPath/{{$product->imgPath}}') center center;
                                                "></div>
                                            </a>
                                        </td>
                                        <td class="align-middle text-capitalize">
                                                <a href="/product/{{$product->id}}" class="text-dark">{{$product->name}}</a>
                                        </td>
                                        <td class="align-middle">${{number_format((float)$product->price,2,'.','')}}</td>
                                        <td class="text-capitalize align-middle">{{$product->status}}</td>
                                        <td class="align-middle">
                                            <a href="/product/{{$product->id}}" class="btn btn-outline-success btn-sm">View</a>
                                            <a href="/products/manage/edit/{{$product->id}}" class="btn btn-outline-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        No products <a href="/products/manage/add" class="btn btn-outline-success btn-sm">Add a product</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

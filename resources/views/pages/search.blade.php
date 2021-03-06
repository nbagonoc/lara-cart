@extends("layouts.app")
@section("content")
    <div class="row">
        @if(count($products)>=1)
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 pl-md-2 pr-md-2">
                    <div class="card mb-3">
                        <a href="/product/{{$product->id}}">
                            <div class="card-image rounded-top" style="
                            background: url('/storage/imgPath/{{$product->imgPath}}') center center;
                            "></div>
                        </a>
                        <div class="card-body">
                            <a href="/product/{{$product->id}}" class="text-dark"><h6 class="text-capitalize font-weight-light mb-0">{{$product->name}}</h6></a>
                            <a href="/shop/{{$product->category}}" class="text-capitalize text-secondary small">{{$product->category}}</a>
                            <h5 class="text-success mt-2 mb-0">${{number_format((float)$product->price,2,'.','')}}</h5>
                            {{-- @guest
                                <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-block mt-2">Add to Cart</a>
                            @endguest
                            @auth
                                @if(Auth::user()->role=='user')
                                    <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-block mt-2">Add to Cart</a>
                                @endif
                            @endauth --}}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                {{$products->links()}}
            </div>
        @else
            <div class="col-12">
                    <span class="">Product not found. Please try a different keyword</span>
            </div>
        @endif
    </div>
@endsection
@extends("layouts.app")
@section("content")
        <div class="row">
            @if(count($products)>=1)
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-4">
                        <div class="card mb-3">
                            <a href="/product/{{$product->id}}">
                                <img src="{{$product->imgPath}}" alt="{{$product->name}}" class="card-img-top img-responsive">
                            </a>
                            <div class="card-body">
                                <h5 class="mb-0 text-capitalize font-weight-light">{{$product->name}}</h5>
                                <h4 class="mb-0 text-success">${{number_format((float)$product->price,2,'.','')}}</h4>
                                <a href="/add-to-cart/{{$product->id}}" class="btn btn-outline-success btn-block mt-3">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
@endsection
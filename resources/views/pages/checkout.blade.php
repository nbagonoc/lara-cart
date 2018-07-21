@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>

                <div class="card-body">
                    <h5>Total amout to pay: <span class="text-success">${{number_format((float)$total,2,'.','')}}</span></h5>
                    <form action="/checkout" method="post">
                        {{csrf_field()}}
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{config('services.stripe.key')}}"
                            data-amount="{{$total*100}}"
                            data-email="{{Auth::user()->email}}"
                            data-allow-remember-me="false"
                            data-name="Lara-Cart"
                            data-shippingAddress="true"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto">
                        </script>
                        <script>
                            document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                        </script>
                        <button type="submit" class="btn btn-outline-success btn-sm">Pay with card, via Stripe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

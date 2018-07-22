@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Account Details</div>

                <div class="card-body">
                    <span class="text-capitalize">welcome, {{Auth::user()->name}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">Sign-in</div>
                </div>

                <div class="card-body text-center">
                    <h4 class="font-weight-light m-0">Only a few clicks away</h4>
                    <a href="/auth/google" class="btn btn-outline-success my-3">Sign-in with Google</a>
                    <p class="small text-muted">By signing-in, you agree to LaraCart's <a href="#">terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                    {{-- <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-success btn-sm">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link text-success" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div> --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

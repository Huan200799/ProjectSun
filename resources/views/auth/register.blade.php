@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form method="POST" class="login100-form validate-form" action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title">
                    {{ trans('message.register') }}
                </span>

                <div class="wrap-input100 validate-input">
                        <input id="name" placeholder="{{ trans('message.name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input">
                        <input id="email" placeholder="{{ trans('message.address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input">
                        <input id="password" placeholder="{{ trans('message.password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input">
                        <input id="password-confirm" placeholder="{{ trans('message.confirmpassword') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="wrap-input100 validate-input">
                        <input id="address" placeholder="{{ trans('message.address') }}" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input">
                        <input id="phone" placeholder="{{ trans('message.phone') }}" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input">
                        <button type="submit" class="login100-form-btn" >
                        {{ trans('message.register') }}
                        </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ route('login') }}">
                        {{ trans('message.login') }}
                    </a>&nbsp;
                    <a class="txt2" href="{{ route('register') }}">
                        {{ trans('message.register') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form method="POST" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title">
                    {{ trans('message.login') }}
                </span>

                <div class="wrap-input100 validate-input">
                    <input id="email" placeholder="{{ trans('message.address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input">
                    <input id="password" placeholder="{{ trans('message.password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ trans('message.login') }}
                    </button>
                </div>
                <div class="login mt-3">
                    <a href="{{asset('google/redirect')}}"><input type="" name="" value="Login Google" class="btn btn-warning"></a>
                </div>
                <div class="login mt-3">
                    <a href="{{asset('facebook/redirect')}}"><input type="" name="" value="Login Facebook" class="btn btn-primary"></a>
                </div>
                <div class="text-center p-t-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="form-check-label" for="remember">
                            {{ trans('message.remember') }}
                        </label>
                    </div>
                </div>

                <div class="text-center p-t-12">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ trans('message.forgotpassword') }}
                        </a>
                    @endif
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

@extends('layouts.front')

@section('content')

<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="n-customer">
                    <h5>New Customer</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem est eum earum eius dolores,
                        alias modi aut officia quo perferendis id aspernatur neque provident quas, quidem libero
                        veritatis voluptatum illum!</p>
                    <a href="{{ route('register') }}">Create an Account</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="r-customer">
                    <h5>Registered Customer</h5>
                    <p>If you have an account with us, please log in.</p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="emal">
                            <label>User name or email address</label>
                            <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="pass">
                            <label>Password</label>
                            <input type="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between nam-btm">
                            <div>
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Remember Me</label>
                            </div>
                            @if (Route::has('password.request'))
                            <div>
                                <a href="{{ route('password.request') }}">Lost your password?</a>
                            </div>
                            @endif
                        </div>
                        <button type="submit">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

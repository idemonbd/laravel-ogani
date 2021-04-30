@extends('layouts.front')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <h5>Create Your Account</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Name</label>
                            @error('name')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" class="@error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autocomplete="name" required autofocus placeholder="Your name">
                        </div>
                        <div class="col-md-12">
                            <label>Email Address*</label>
                            @error('email')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="email" class="@error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Your email address">
                        </div>

                        <div class="col-md-12">
                            <label>Password*</label>
                            @error('password')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="password" class="@error('password') is-invalid @enderror" required
                                autocomplete="new-password" placeholder="Password should be more than 8 character">
                        </div>

                        <div class="col-md-12">
                            <label>Confirm Password*</label>
                            <input type="text" name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm your password">
                        </div>
                        <div class="col-md-7">
                            <div>
                                <input type="checkbox" name="t-box" id="t-box">
                                <label for="t-box">I have read the terms and condition.</label>
                            </div>
                        </div>
                        <div class="col-md-5 text-right">
                            <button type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
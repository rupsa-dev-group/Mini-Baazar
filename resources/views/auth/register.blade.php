@extends('user.layout.app')
@section('front_container')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>                    
                <span></span> Sign-Up
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-5">
                            @foreach ($errors->all() as $error)
                                <div style="background-color: rgb(237, 185, 185); padding:10px;">
                                    <li>{{ $error }}</li>
                                </div>
                            @endforeach
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Sign Up</h3>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <!-- Name -->
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Your Name" class="form-control">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <!-- Email Address -->
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <!-- Phone Number -->
                                        <div class="form-group">
                                            <input type="number" name="phone" value="{{ old('phone') }}" placeholder="Your Phone Number" class="form-control">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <!-- Password -->
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password" class="form-control">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up">Sign Up</button>
                                        </div>
                                        <!-- Login Link -->
                                        <div class="form-group">
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                                {{ __('Already registered?') }}
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <img src="{{ asset('front_assets/imgs/login.png') }}" alt="Login Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

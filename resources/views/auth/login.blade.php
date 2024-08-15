@extends('user.layout.app')
@section('front_container')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>                    
                <span></span> Login
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Login</h3>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Email Address -->
                                        <div class="form-group">
                                            <input type="email" required name="email" placeholder="Your Email" value="{{ old('email') }}" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <!-- Password -->
                                        <div class="form-group">
                                            <input required type="password" name="password" placeholder="Password" class="form-control">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    
                                       
                                        <!-- Submit Button -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up">Login</button>
                                        </div>
                                        <!-- Sign Up Link -->
                                        <div class="form-group">
                                            <a href="{{ route('register') }}">Sign Up</a>
                                        </div>
                                        <!-- Forgot Password Link -->
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                Forgot your password?
                                            </a>
                                        @endif
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

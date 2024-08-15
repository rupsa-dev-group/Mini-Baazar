@extends('user.layout.app')
@section('front_container')
    <section class="ptb-100 profile-main">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xl-4">
                    <div class="wrapper profile-left-section">
                        <div class="profile">
                            <img style="text-align: center" src="{{ asset('front_assets/imgs/theme/icons/profile.svg') }}"
                                alt="" class="profile-logo p-3">
                            <div class="profile-about px-5">
                                <h4 style="text-align: center">{{ strtoupper($user->name) }}</h4>
                                <p style="text-align: center">{{ $user->email }}</p>
                                {{-- <p style="text-align: center">{{$user->user_type}}</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="wrapper text-center p-5 profile-left-section-bottom mt-20">
                        <div class="profile-details">

                            @if ($user->user_type == 'Admin')
                            <div class="para-div">
                                <a href="{{ route('dashboard.index') }}">
                                    <i class="fa-solid fa-dashboard"></i>
                                    <p>My Dashboard</p>
                                </a>
                            </div>
                        @endif

                            <div class="para-div">

                                <a href="{{ route('profile.edit') }}">
                                    <i class="fa-solid fa-user"></i>
                                    <p>My Profile</p>
                                </a>
                            </div>
                          

                            <div class="para-div">
                                <a href="order.html">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                    <p>My Orders</p>
                                </a>
                            </div>
                            <div class="para-div">
                                <a href="wishlist.html">
                                    <i class="fa-solid fa-heart"></i>
                                    <p>Wishlist</p>
                                </a>
                            </div>
                            <div class="para-div">
                                <a href="{{ route('profile.manageaddress') }}">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p>Manage Address</p>
                                </a>
                            </div>
                            <div class="para-div">
                                <a href="{{ route('profile.changepassword') }}">
                                    <i class="fa-solid fa-lock"></i>
                                    <p>Change Password</p>
                                </a>
                            </div>
                            {{-- <div class="para-div">
                            <a href="{{route('profile.destroyaccount')}}">
                                <i class="fa-solid fa-trash"></i>
                                <p>Delete Account</p>
                            </a>
                        </div> --}}
                            <div class="para-div">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        style="color: red;">
                                        <i class="fa-solid fa-right-from-bracket" style="color: red;"></i>
                                        <p style="color: red;">Log Out</p>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            @section('user_profile')

            @show


        </div>
    </div>
</section>
@endsection

@extends('user.layout.app')
@section('front_container')
<section class="ptb-100 profile-main">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xl-4 ">
          <div class="wrapper profile-left-section">
            <div class="profile">
              <img src="{{ asset('front_assets/imgs/theme/icons/profile.svg')}}" alt="" class="profile-logo p-3">
              <div class="proflie-about px-5">
                <h4>Twinkle Shaw</h4>
                <p>twinkleshaw@gmail.com</p>
              </div>  
            </div>
           
          </div>
          <div class="wrapper text-center p-5 profile-left-section-bottom mt-20">
            <div class="proflie-details ">
              <div class="para-div">
                <a href="profile.html">
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
                <a href="address.html">
                    <i class="fa-solid fa-location-dot"></i>
              <p>Manage Adreess</p>
                </a>    
              </div>
              <div class="para-div">
                <a href="password.html">
                    <i class="fa-solid fa-lock"></i>
                    <p>Change Password</p>
                </a>
              </div>
              <div class="para-div">
                <a href="#">
                    <i class="fa-solid fa-trash"></i>
                    <p>Delete Acount</p>
                </a>
              </div>
              <div class="para-div">
                <a href="#">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Log Out</p>
                </a>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-8 col-sm-12 col-xl-8">
          <div class="wrapper p-5 profile-right-section">
            <h3 class="text-center">Update Profile</h3>                             
            <form action="#">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12 ptb-50">
                  <label for="firstname"> Name
                    <span class="text-danger">*</span>
                  </label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="firstName" required placeholder="First name" aria-label="First name">
                </div>

                

                <label for="email">Email
                    <span class="text-danger">*</span>
                  </label>
                  <div class="input-group mb-3">
                    <input type="mail" class="form-control" id="email" required placeholder="email" aria-label="email">
                </div>

                <label for="mob no">Mobile Number
                    <span class="text-danger">*</span>
                  </label>
                  <div class="input-group mb-3">
                    <input type="number" class="form-control" id="mob no" required placeholder="mob no" aria-label="mob no">
                </div>
               
                </div>
              </div>
              <button type="submit" class="btn btn-primary mt-0">Update</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>  

@endsection

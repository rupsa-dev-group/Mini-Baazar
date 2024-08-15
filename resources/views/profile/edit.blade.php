@extends('profile.partials.profile1')

@section('user_profile')
<div class="col-md-8 col-sm-12 col-xl-8">
  <div class="wrapper p-5 profile-right-section">
      <h3 class="text-center">Update Profile</h3>
      @foreach ($errors->all() as $error)
          <div style="background-color: rgb(237, 185, 185); padding:10px;">
              <li>{{ $error }}</li>
          </div>
      @endforeach
      <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
          @csrf
          @method('patch')
          <div class="row">
              <div class="col-sm-12 col-md-12 col-xl-12 ptb-50">
                  <label for="name"> Name
                      <span class="text-danger">*</span>
                  </label>
                  <div class="input-group mb-3">
                      <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}">
                  </div>
                  <label for="email">Email
                      <span class="text-danger">*</span>
                  </label>
                  <div class="input-group mb-3">
                      <input id="email" name="email" type="email" class="form-control" required value="{{ old('email', $user->email) }}">
                  </div>
                  <label for="phone">Mobile Number
                      <span class="text-danger">*</span>
                  </label>
                  <div class="input-group mb-3">
                      <input id="phone" name="phone" type="number" class="form-control" required value="{{ old('phone', $user->phone) }}">
                  </div>
              </div>
              @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                  <div>
                      <p class="text-sm mt-2 text-gray-800">
                          {{ __('Your email address is unverified.') }}
                          <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              {{ __('Click here to re-send the verification email.') }}
                          </button>
                      </p>
                      @if (session('status') === 'verification-link-sent')
                          <p class="mt-2 font-medium text-sm text-green-600">
                              {{ __('A new verification link has been sent to your email address.') }}
                          </p>
                      @endif
                  </div>
              @endif
          </div>
          <div class="flex items-center gap-4">
              <x-primary-button>{{ __('Save') }}</x-primary-button>
              @if (session('status') === 'profile-updated')
                  <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
              @endif
          </div>
      </form>
  </div>
</div>
@endsection


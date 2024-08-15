@extends('profile.partials.profile1')

@section('user_profile')
<div class="col-md-8 col-sm-12 col-xl-8">
    <div class="wrapper password-section p-5">
        <h3>Change Password</h3>

        @if ($errors->updatePassword->any())
            @if ($errors->updatePassword->has('current_password'))
                <div style="background-color: rgb(237, 185, 185); padding:10px;">
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
            @endif
            @if ($errors->updatePassword->has('password'))
                <div style="background-color: rgb(237, 185, 185); padding:10px;">
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>
            @endif
            @if ($errors->updatePassword->has('password_confirmation'))
                <div style="background-color: rgb(237, 185, 185); padding:10px;">
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
            @endif
        @endif

        <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12 ptb-50">
                    <label for="current_password">Old Password
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Old Password" aria-label="Old Password">
                    </div>

                    <label for="password">New Password
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password" aria-label="New Password">
                    </div>

                    <label for="password_confirmation">Confirm Password
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" aria-label="Confirm Password">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-0">Update</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </form>
    </div>
</div>
@endsection

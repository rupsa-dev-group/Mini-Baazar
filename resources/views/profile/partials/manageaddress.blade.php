@extends('profile.partials.profile1')

@section('user_profile')
    <div class="col-md-8 col-sm-12 col-xl-8">
        <div class="wrapper p-5 profile-right-section">
            <h3 class="text-center">Manage Address</h3>
            @foreach ($errors->all() as $error)
                <div style="background-color: rgb(237, 185, 185); padding:10px;">
                    <li>{{ $error }}</li>
                </div>
            @endforeach
            <form method="post" action="{{ route('profile.saveaddress') }}" class="mt-6 space-y-6">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-12 ptb-50">
                        <label for="name">Name
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

                        <label for="address">Address
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-3">
                            <textarea id="address" name="address" cols="30" rows="10" class="form-control">{{ old('address', $user->address) }}</textarea>
                        </div>

                        <label for="country">Country
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="country_id" aria-label="select example">
                                <option value="">Open this select country</option>
                                @foreach ($country as $list)
                                    <option value="{{ $list->id }}" {{ $user->country_id == $list->id ? 'selected' : '' }}>{{ $list->country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="state">State
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="state_id" aria-label="select example">
                                <option value="">Open this select state</option>
                                @foreach ($state as $list)
                                    <option value="{{ $list->id }}" {{ $user->state_id == $list->id ? 'selected' : '' }}>{{ $list->state_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="city">City
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-3">
                            <input id="city" name="city" type="text" class="form-control" value="{{ old('city' , $user->city) }}">
                        </div>

                        <label for="postcode">PostCode
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-3">
                            <input id="postcode" name="postcode" type="text" class="form-control" value="{{ old('postcode', $user->postcode)}}">
                            <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}">
                        </div>

                    </div>
                </div>
                <button class="btn btn-gray">Save</button>
            </form>
        </div>
    </div>
@endsection

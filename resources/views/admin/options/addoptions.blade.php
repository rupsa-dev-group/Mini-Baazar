@extends('admin.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('container')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Options</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Options</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/options') }}"><button type="button" class="btn btn-success">
                                Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-7 mx-auto">
                    @foreach ($errors->all() as $error)
                        <div style="background-color: rgb(237, 185, 185); padding:10px;">
                            <li> {{ $error }}</li>
                        </div>
                    @endforeach
                    <div class="card border-top border-0 border-4 border-primary mt-2">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">{{ $header }}</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="{{ route('option.save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Options Name</label>
                                    <input type="text" name="option_name"
                                        value="{{ old('option_name', $option_name ?? '') }}" class="form-control"
                                        id="inputFirstName">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Options Type</label>
                                    <select name="option_type" class="form-select" aria-label="select example">
                                        <option value="">Selected your Option</option>
                                        @if ($option_type == 'radio')
                                            <option selected value="radio">Radio</option>
                                            <option value="checkbox">Checkbox</option>
                                            <option value="color">Color</option>
                                        @elseif($option_type == 'checkbox')
                                            <option selected value="radio">Radio</option>
                                            <option selected value="checkbox">Checkbox</option>
                                            <option value="color">Color</option>
                                        @elseif($option_type == 'color')
                                            <option value="radio">Radio</option>
                                            <option value="checkbox">Checkbox</option>
                                            <option selected value="color">Color</option>
                                        @else
                                            <option value="radio">Radio</option>
                                            <option value="checkbox">Checkbox</option>
                                            <option value="color">Color</option>
                                        @endif


                                    </select>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary px-5">{{ $btn }}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

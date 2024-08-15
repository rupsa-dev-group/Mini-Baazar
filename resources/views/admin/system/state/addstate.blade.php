@extends('admin.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('container')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">State</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add State</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/state') }}"><button type="button" class="btn btn-success">
                                Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-7 mx-auto">
                    <div class="card border-top border-0 border-4 border-primary mt-2">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-primary">{{$header}}</h5>
                            </div>
                            <hr>
                            @foreach ($errors->all() as $error)
                                <div style="background-color: rgb(237, 185, 185); padding:10px;">
                                    <li>{{ $error }}</li>
                                </div>
                            @endforeach

                            <form class="row g-3" action="{{ route('state.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">

                                <div class="col-md-12">
                                    <label for="inputCountry" class="form-label">Country</label>
                                    <select class="form-select" name="country_id" aria-label="Select Country">
                                        <option value="">Open this select State</option>
                                        @foreach ($country as $list)
                                            @if ($country_id == $list->id)
                                                <option selected value="{{ $list->id }}">{{ $list->country }}</option>
                                            @else
                                                <option value="{{ $list->id }}">{{ $list->country }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">State</label>
                                    <input type="text" name="state_name" class="form-control" value="{{ old('state_name', $state_name ?? '') }}" id="inputState">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputImage" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="imageInput" accept="image/*">
                                    @if(!empty($image))
                                        <img src="{{ asset('images/state/' . $image) }}" id="imagePreview" class="mt-2" alt="Preview Image" height="100px" width="100px">
                                    @else
                                        <img src="" id="imagePreview" class="mt-2" alt="Preview Image" height="100px" width="100px" style="display: none;">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Shipping Charges Price</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price', $price ?? '') }}" id="price">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-5">{{$btn}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the input element and image preview element
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('imagePreview');

        // Add event listener to input field to detect changes in file selection
        input.addEventListener('change', function() {
            // Check if any file is selected
            if (input.files && input.files[0]) {
                // Create a FileReader object
                const reader = new FileReader();

                // Set up the reader onload function to display the image
                reader.onload = function(e) {
                    // Set the src attribute of the image preview to the data URL
                    preview.src = e.target.result;
                    // Display the image preview
                    preview.style.display = 'block';
                }

                // Read the selected file as a data URL
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection

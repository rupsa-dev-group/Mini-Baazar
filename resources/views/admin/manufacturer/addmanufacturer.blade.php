@extends('admin.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('container')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Manufacturer</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $header }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/manufacturer') }}"><button type="button" class="btn btn-success">
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
                            <form class="row g-3" action="{{ route('manufacturer.save') }}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $id }}">
                                @csrf

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Brand Name</label>
                                    <input type="text" name="brand"
                                        value="{{ old('brand', $brand ?? '') }}"class="form-control"
                                        id="inputFirstName">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="imageInput" accept="image/*">
                                    @if(!empty($image))
                                        <img src="{{ asset('images/brand/' . $image) }}" id="imagePreview" class="mt-2" alt="Preview Image" height="100px" width="100px">
                                    @else
                                        <img src="" id="imagePreview" class="mt-2" alt="Preview Image" height="100px" width="100px" style="display: none;">
                                    @endif



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

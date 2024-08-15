@extends('admin.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('container')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Shipping Charges</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Shipping Charges</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/shipping') }}"><button type="button" class="btn btn-success">
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

                                <h5 class="mb-0 text-primary">Pay Using Instamojo</h5>
                            </div>
                            <hr>
                            <form class="row g-3">
                                
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Status</label>
                                    <select class="form-select" required aria-label="select example">
                                        <option value="Select">Select</option>
                                        <option value="Radio">Radio</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Payment Key</label>
                                    <input type="email" class="form-control" id="inputFirstName">
                                </div>
                                 
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Payment Secret</label>
                                    <input type="email" class="form-control" id="inputFirstName">
                                </div>
                                 
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Payment Mode</label>
                                    <select class="form-select" required aria-label="select example">
                                        <option value="Select">Select</option>
                                        <option value="Radio">Radio</option>
                                        
                                    </select>
                                </div>
                                 
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Merchant Email</label>
                                    <input type="email" class="form-control" id="inputFirstName">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Payment URL</label>
                                    <input type="email" class="form-control" id="inputFirstName">
                                </div>

                            



                                <div class="col-12">
                                    <button class="btn btn-primary px-5">Save</button>
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

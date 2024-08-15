@extends('admin.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('container')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Country</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Country</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/country') }}"><button type="button" class="btn btn-success">
                                Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-7 mx-auto">
                    @foreach ($errors->all() as $error)
                    <div  style="background-color: rgb(237, 185, 185); padding:10px;"> <li> {{ $error }}</li></div>
                    @endforeach

                    <div class="card border-top border-0 border-4 border-primary mt-2">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">

                                <h5 class="mb-0 text-primary">{{$header}}</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="{{ route('country.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Country</label>
                                    <input type="text" name="country" class="form-control" id="inputFirstName" value="{{ old('country', $country ?? '') }}">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputCategoryImage" class="form-label">Category Image</label>
                                    <input type="file" name="image" class="form-control" id="inputCategoryImage" accept="image/*" onchange="previewImage(event)">
                                   
                                    @if(!empty($image))
                                    <img src="{{ asset('images/country/' . $image) }}" id="imagePreview" class="mt-2" alt="Preview Image" height="100px" width="100px">
                                @else
                                    <img src="" id="imagePreview" class="mt-2" alt="Preview Image" height="100px" width="100px" style="display: none;">
                                @endif
                                   
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
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection

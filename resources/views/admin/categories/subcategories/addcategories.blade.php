@extends('admin.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('container')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Categories</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Sub Categories</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/subcategories') }}"><button type="button" class="btn btn-success">
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
                            <form class="row g-3" action="{{ route('subcategories.save') }}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $id }}">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Main Categorie Name</label>
                                    <select class="form-select" name="mcategory_id" aria-label="select example">
                                        <option value="">Open this select category</option>
                                        @foreach ($category as $list)
                                        
                                            @if ($mcategory_id == $list->id)
                                                <option selected value="{{ $list->id }}">{{ $list->name }}</option>
                                            @else
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Categorie Name</label>
                                    <input type="text" name="s_name" class="form-control"
                                        value="{{ old('s_name', $s_name ?? '') }}" >
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Categorie Slug</label>
                                    <input type="text" 
                                        class="form-control" name="s_slug" value="{{ old('s_slug', $s_slug ?? '') }}">
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

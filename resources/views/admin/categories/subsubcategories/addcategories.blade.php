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
                            <li class="breadcrumb-item active" aria-current="page">Add Sub Sub Categories</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/subsubcategories') }}"><button type="button" class="btn btn-success">
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
                            <form class="row g-3" action="{{ route('subsubcategories.save') }}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{$id}}">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Main Categorie Name</label>
                                    <select onchange="onchange_category()" class="form-select" name="mcategory_id"
                                        aria-label="select example">
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

                                <div id="sscategory">
                                    <div class="col-md-12">
                                        <label for="inputFirstName" class="form-label">Sub Categorie Name</label>
                                        <select class="form-select" name="scategory_id" aria-label="select example">
                                            <option value="">Open this select category</option>
                                            @foreach ($scategory as $list)
                                                @if ($scategory_id == $list->id)
                                                    <option selected value="{{ $list->id }}">{{ $list->s_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $list->id }}">{{ $list->s_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div id="sscategory_show">


                                </div>



                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Categorie Name</label>
                                    <input type="text" name="ss_name"  value="{{ old('ss_name', $ss_name ?? '') }}" class="form-control" id="inputFirstName">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Categorie Slug</label>
                                    <input type="text" name="ss_slug"  value="{{ old('ss_slug', $ss_slug ?? '') }}" class="form-control" id="inputFirstName">
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

    <script>
        function onchange_category() {
            var y = event.target.value;
            var csrf = $("meta[name='csrf-token']").attr("content");
            console.log(y);
            $.ajax({
                type: 'POST',
                url: '/subsubcategories/onchange_category',
                data: {
                    id: y,
                    _token: csrf
                },
                success: function(response) {
                    jQuery('#sscategory').hide();
                    jQuery('#sscategory_show').html(response);

                }
            });
        }
    </script>
@endsection

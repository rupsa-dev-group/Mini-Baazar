@extends('admin.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('container')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Coupon</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$header}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/coupon') }}"><button type="button" class="btn btn-success">
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

                                <h5 class="mb-0 text-primary">{{$header}}</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="{{ route('coupon.save') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Coupon Name</label>
                                    <input type="text" name="coupon_name"  value="{{ old('coupon_name', $coupon_name ?? '') }}" class="form-control" id="inputFirstName">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Coupon Code</label>
                                    <input type="text" name="coupon_code" value="{{ old('coupon_code', $coupon_code ?? '') }}" class="form-control" id="inputFirstName">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Discount</label>
                                    <input type="number" name="discount" value="{{ old('discount', $discount ?? '') }}" class="form-control" id="inputFirstName">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Type</label>
                                    <select name="dis_type" class="form-select" required aria-label="select example">
                                    @if ($dis_type == 'percentage')
                                    <option selected value="percentage">Percentage</option>
                                    <option value="fixed">Fixed</option>
                                    @elseif($dis_type == 'fixed')
                                    <option value="percentage">Percentage</option>
                                    <option selected value="fixed">Fixed</option>
                                    @else
                                    <option value="percentage">Percentage</option>
                                    <option value="fixed">Fixed</option>
                                    @endif
                                   
                                        
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" value="{{ old('start_date', $start_date ?? '') }}" class="form-control" id="inputFirstName">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">End Date</label>
                                    <input type="date" name="end_date" value="{{ old('end_date', $end_date ?? '') }}" class="form-control" id="inputFirstName">
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
@endsection

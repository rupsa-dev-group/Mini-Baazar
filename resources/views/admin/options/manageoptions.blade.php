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
                            <li class="breadcrumb-item active" aria-current="page">Manage Options</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('/options/add') }}"><button type="button" class="btn btn-primary">Add
                            Options</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">Manage Options</h6>
            <hr />
            @if (session()->has('message'))
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i></div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">{{ session('message') }}</h6>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if (isset($options[0]))
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL No.</th>
                                        <th>Option Name </th>
                                        <th>Option Type </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($options as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->option_name }}</td>
                                            <td>{{ $item->option_type }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span
                                                        class="badge bg-gradient-quepal text-white shadow-sm w-100">Active</span>
                                                @else
                                                    <span
                                                        class="badge bg-gradient-bloody text-white shadow-sm w-100">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span onclick="option_status(0, '{{ $item->id }}')"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fadeIn animated bx bx-toggle-left"></i>
                                                    </span>
                                                @else
                                                    <span onclick="option_status(1, '{{ $item->id }}')"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fadeIn animated bx bx-toggle-right"></i>
                                                    </span>
                                                @endif
                                                <a href="{{ url('options/add') }}/{{ encrypt($item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="lni lni-pencil-alt"></i>
                                                </a>
                                                <span onclick="option_delete('{{ $item->id }}')"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fadeIn animated bx bx-trash-alt"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL No.</th>
                                        <th>Option Name </th>
                                        <th>Option Type </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <center>
                                <h2>Data Not Found!</h2>
                            </center>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function option_status(status, id) {
            var csrf = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                type: 'POST',
                url: '/options/status_update',
                data: {
                    status: status,
                    id: id,
                    _token: csrf
                },
                success: function(response) {
                    location.reload();
                }
            });
        }

        function option_delete(id) {
            if (confirm('Are you sure you want to delete this Option?')) {
                var csrf = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    type: 'POST',
                    url: '/options/option_delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        }
    </script>
@endsection

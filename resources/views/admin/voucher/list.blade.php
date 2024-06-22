@extends('layouts.admin.master')

@section('title', 'Danh sách mã giảm giá')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div id="msg-box">
                            <?php //Hiển thị thông báo thành công
                            ?>
                            @if (Session::has('success'))
                                <div class="alert alert-success solid alert-dismissible fade show">
                                    <span><i class="mdi mdi-check"></i></span>
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                            <?php //Hiển thị thông báo lỗi
                            ?>
                            @if (Session::has('error'))
                                <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                    <span><i class="mdi mdi-help"></i></span>
                                    <strong>{{ Session::get('errors') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Danh sách mã giảm giá</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Mã</th>
                                                <th scope="col">Tên chương trình</th>
                                                <th scope="col">Giảm giá</th>
                                                <th scope="col">Ngày có hiệu lực</th>
                                                <th scope="col">Ngày hết hạn</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($voucher as $item)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'PBH000' . $item->id }}</th>
                                                    <td>
                                                        {{ $item->code }}
                                                    </td>
                                                    <td>
                                                        {{ $item->name }}
                                                    </td>
                                                    <td>
                                                        {{ number_format($item->discount) }}
                                                    </td>
                                                    <td>
                                                        {{ Carbon::parse($item->start_date)->format('d-m-Y') }}
                                                    </td>
                                                    <td>
                                                        {{ Carbon::parse($item->end_date)->format('d-m-Y') }}
                                                    </td>
                                                    <td>
                                                        @if ($item && $item->status === 1)
                                                            <span class="badge bg-success">Hoạt động</span>
                                                        @else
                                                            <span class="badge bg-danger">Không hoạt động</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Voucher_Edit', $item->id) }}"
                                                                class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center text-danger">
                                                    <td colspan="12" style="color: red !important">Không có bản ghi</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $voucher->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

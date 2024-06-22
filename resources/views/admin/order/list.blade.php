@extends('layouts.admin.master')

@section('title', 'Danh sách đơn hàng')

@section('content')

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
                                <h4 class="card-title mb-4">Danh sách đơn hàng</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Phương thức thanh toán</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Ngày tạo</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($order as $item)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'OR000' . $item->id }}</th>
                                                    <td>
                                                        @if ($item->email)
                                                            <span>{{ $item->email }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->phone)
                                                            <span>{{ $item->phone }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->payment_type)
                                                            <span>{{ $item->payment_type }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $totalPayment = 0;
                                                        @endphp

                                                        @if ($item->orderDetail->isNotEmpty())
                                                            @foreach ($item->orderDetail as $orderDetail)
                                                                @php
                                                                    $totalPayment += $orderDetail->total_payment;
                                                                @endphp
                                                            @endforeach

                                                            <span>{{ number_format($totalPayment) }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($item->created_at)
                                                            <span>{{ $format = date('d-m-Y', strtotime($item->created_at)) }}</span>
                                                        @else
                                                            <span>Không có ngày sinh</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item && $item->status === 0)
                                                            <span class="badge bg-warning">Đang chờ</span>
                                                        @elseif ($item && $item->status === 1)
                                                            <span class="badge bg-success">Đã thanh toán</span>
                                                        @else
                                                            <span class="badge bg-danger">Huỷ</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Orders_PDF', $item->id) }}"
                                                                class="btn btn-success mb-2">Export
                                                                PDF</a>
                                                            <a href="{{ route('route_BackEnd_Orders_Edit', $item->id) }}"
                                                                class="btn btn-primary btn-sm">Xem chi tiết đơn hàng</a>
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
                                    {{ $order->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

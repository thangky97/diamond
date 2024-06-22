@extends('layouts.admin.master')

@section('title', 'Danh sách chi tiết đơn hàng')

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
                                <h4 class="card-title mb-4">Danh sách chi tiết đơn hàng</h4>
                                @php
                                    $displayedUserId = null;
                                @endphp

                                @foreach ($orderDetail as $item)
                                    @if ($displayedUserId !== $item->user->id)
                                        <div>
                                            <p>
                                                <span>Tên KH: {{ $item->user->username }}</span>
                                            </p>
                                            <p>
                                                <span>Email: {{ $item->user->email }}</span>
                                            </p>
                                            <p>
                                                <span>Số điện thoại: {{ $item->user->phone }}</span>
                                            </p>
                                            <p>
                                                <span>Ghi chú: {{ $item->note ?: '' }}</span>
                                            </p>
                                        </div>
                                        @php
                                            $displayedUserId = $item->user->id;
                                        @endphp
                                    @endif
                                @endforeach

                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên SP</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Giảm giá</th>
                                                <th scope="col">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orderDetail as $item)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'OR000' . $item->id }}</th>
                                                    <td>
                                                        @if ($item->product)
                                                            <span>{{ $item->product->name }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->quantity)
                                                            <span>{{ $item->quantity }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->price)
                                                            <span>{{ number_format($item->price) }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->discount)
                                                            <span>{{ number_format($item->discount) }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->total_payment)
                                                            <span>{{ number_format($item->total_payment) }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>
                                                            {{-- <a href="{{ route('route_BackEnd_Orders_Edit', $item->id) }}"
                                                                class="btn btn-primary btn-sm">Chỉnh sửa</a> --}}
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
                            </div>
                        </div>
                        <div class="mb-0 text-end">
                            <div style="display: flex; justify-content: end; gap: 5px">
                                <form action="{{ route('route_BackEnd_Orders_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @php
                                        $displayedStatusOrder = null;
                                    @endphp

                                    @foreach ($orderDetail as $index => $item)
                                        @if ($displayedStatusOrder !== $item->order->id)
                                            @if ($item->order->status === 0)
                                                <button type="submit" class="btn btn-success waves-effect">Xác nhận thanh
                                                    toán</button>
                                                <input type="text" name="status" value="1" hidden>
                                            @endif
                                            @php
                                                $displayedStatusOrder = $item->order->id;
                                            @endphp
                                        @endif
                                    @endforeach
                                </form>
                                <form action="{{ route('route_BackEnd_Orders_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @php
                                        $displayedStatusCancelOrder = null;
                                    @endphp

                                    @foreach ($orderDetail as $index => $item)
                                        @if ($displayedStatusCancelOrder !== $item->order->id)
                                            @if ($item->order->status === 0)
                                                <button type="submit" class="btn btn-danger waves-effect">Huỷ</button>
                                                <input type="text" name="status" value="2" hidden>
                                            @endif
                                            @php
                                                $displayedStatusCancelOrder = $item->order->id;
                                            @endphp
                                        @endif
                                    @endforeach
                                </form>


                                <a href="{{ route('route_BackEnd_Orders_List') }}"
                                    class="btn btn-secondary waves-effect">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

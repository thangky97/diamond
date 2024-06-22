@extends('layouts.admin.master')

@section('title', 'Danh sách bài viết')

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
                                <h4 class="card-title mb-4">Danh sách phiếu bảo hành</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Người dùng</th>
                                                <th scope="col">Thời gian bảo hành</th>
                                                <th scope="col">Ngày bảo hành</th>
                                                {{-- <th scope="col">Nội dung ngắn</th> --}}
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($warranty as $item)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'PBH000' . $item->id }}</th>
                                                    <td>
                                                        @if ($item->product)
                                                            <span>{{ $item->product->name }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->user)
                                                            <span>{{ $item->user->username }}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item->time }} tháng
                                                    </td>
                                                    <td>
                                                        {{ Carbon::parse($item->date)->format('d-m-Y') }}
                                                    </td>
                                                    {{-- <td>
                                                        @if ($item->short_desc)
                                                            @php
                                                                $limitedMessage = Str::limit(
                                                                    $item->short_desc,
                                                                    20,
                                                                    '...',
                                                                );
                                                            @endphp
                                                            <span>{!! $limitedMessage !!}</span>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td> --}}
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Warranty_Edit', $item->id) }}"
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
                                    {{ $warranty->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

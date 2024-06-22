@extends('layouts.admin.master')

@section('title', 'Danh sách giấy chứng nhận')

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
                                <h4 class="card-title mb-4">Danh sách giấy chứng nhận</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Số chứng thư</th>
                                                <th scope="col">Hình dạng</th>
                                                <th scope="col">Kích thước</th>
                                                <th scope="col">Trọng lượng</th>
                                                <th scope="col">Độ tinh khiết</th>
                                                <th scope="col">Cấp màu</th>
                                                <th scope="col">Độ chế tác</th>
                                                <th scope="col">Độ chói</th>
                                                <th scope="col">Độ phát lửa</th>
                                                <th scope="col">Độ lấp lánh</th>
                                                <th scope="col">Huỳnh quang</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($certificate as $item)
                                                <tr>
                                                    <th scope="row" class="text-primary">{{ 'PBH000' . $item->id }}</th>
                                                    <td>
                                                        {{ $item->sochungthu }}
                                                    </td>
                                                    <td>
                                                        {{ $item->shap }}
                                                    </td>
                                                    <td>
                                                        {{ $item->kichthuoc }}
                                                    </td>
                                                    <td>
                                                        {{ $item->weight }}
                                                    </td>
                                                    <td>
                                                        {{ $item->dotinhkhiet }}
                                                    </td>
                                                    <td>
                                                        {{ $item->color }}
                                                    </td>
                                                    <td>
                                                        {{ $item->dochetac }}
                                                    </td>
                                                    <td>
                                                        {{ $item->dochoi }}
                                                    </td>
                                                    <td>
                                                        {{ $item->dophatlua }}
                                                    </td>
                                                    <td>
                                                        {{ $item->dolaplanh }}
                                                    </td>
                                                    <td>
                                                        {{ $item->huynhquang }}
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ route('route_BackEnd_Certificate_Edit', $item->id) }}"
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
                                    {{ $certificate->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

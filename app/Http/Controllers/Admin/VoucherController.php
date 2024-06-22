<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherRequest;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VoucherController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $voucher = Voucher::orderBy('id', 'desc')->paginate(10);

        return view('admin.voucher.list', compact('voucher'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Voucher_Create";

        if ($request->isMethod('post')) {
            $request->validate([
                'code' => ['required', 'regex:/^\S*$/'],
                'name' => 'required',
                'discount' => 'required|gte:0',
                'start_date' => 'required',
                'end_date' => 'required',
            ], [
                'code.required' => 'Mã sản phẩm bắt buộc nhập!',
                'code.regex' => 'Mã sản phẩm không được chứa khoảng trắng!',
                'name.required' => 'Vui lòng nhập tên chương trình!',
                'discount.required' => 'Vui lòng nhập mã giảm giá!',
                'discount.gte' => 'Giá phải là số dương không âm',
                'start_date.required' => 'Vui lòng chọn ngày bắt đầu!',
                'end_date.required' => 'Vui lòng chọn ngày kết thúc!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new Voucher();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm voucher thành công!');
                return redirect()->route('route_BackEnd_Voucher_List');
            } else {
                Session::flash('error', 'Thêm voucher không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.voucher.create');
    }

    public function edit($id)
    {
        $modelVoucher = new Voucher();
        $voucher = $modelVoucher->loadOne($id);
        $this->v['voucher'] = $voucher;
        return view('admin.voucher.edit', $this->v);
    }

    public function update($id, VoucherRequest $request)
    {

        $method_route = 'route_BackEnd_Voucher_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelVoucher = new Voucher();
        $res = $modelVoucher->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Voucher_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
}

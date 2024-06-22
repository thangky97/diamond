<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarrantyRequest;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WarrantyController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $warranty = Warranty::with('user')->with('product')->orderBy('id', 'desc')->paginate(10);

        return view('admin.warranty.list', compact('warranty'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Warranty_Create";
        $user = DB::table('users')->where('role', 0)->get();
        $product = DB::table('products')->get();

        if ($request->isMethod('post')) {
            $request->validate([
                'user_id' => 'required',
                'product_id' => 'required',
                'time' => 'required',
                'date' => 'required',
                'description' => 'required',
            ], [
                'user_id.required' => 'Bạn chưa chọn người dùng!',
                'product_id.required' => 'Bạn chưa chọn sản phẩm!',
                'time.required' => 'Vui lòng nhập thời gian bảo hành!',
                'date.required' => 'Vui lòng chọn ngày tạo!',
                'description.required' => 'Vui lòng nhập mô tả!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new Warranty();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm bài viết thành công!');
                return redirect()->route('route_BackEnd_Warranty_List');
            } else {
                Session::flash('error', 'Thêm bài viết không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.warranty.create', compact('user', 'product'));
    }

    public function edit($id)
    {
        $modelWarranty = new Warranty();
        $warranty = $modelWarranty->loadOne($id);
        $this->v['user_id'] = DB::table('users')->get();
        $this->v['product_id'] = DB::table('products')->get();
        $this->v['warranty'] = $warranty;
        return view('admin.warranty.edit', $this->v);
    }

    public function update($id, WarrantyRequest $request)
    {

        $method_route = 'route_BackEnd_Warranty_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelWarranty = new Warranty();
        $res = $modelWarranty->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Warranty_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
}

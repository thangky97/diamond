<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CertificateController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $certificate = Certificate::orderBy('id', 'desc')->paginate(10);

        return view('admin.certificate.list', compact('certificate'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Certificate_Create";

        if ($request->isMethod('post')) {
            $request->validate([
                'sochungthu' => 'required',
                'shap' => 'required',
                'kichthuoc' => 'required',
                'weight' => 'required',
                'dotinhkhiet' => 'required',
                'color' => 'required',
                'dochetac' => 'required',
                'dochoi' => 'required',
                'dophatlua' => 'required',
                'dolaplanh' => 'required',
                'huynhquang' => 'required',
            ], [
                'sochungthu.required' => 'Vui lòng nhập số chứng thư',
                'shap.required' => 'Vui lòng nhập hình dạng',
                'kichthuoc.required' => 'Vui lòng nhập kích thước',
                'weight.required' => 'Vui lòng nhập trọng lượng',
                'dotinhkhiet.required' => 'Vui lòng nhập độ tinh khiết',
                'color.required' => 'Vui lòng nhập màu',
                'dochetac.required' => 'Vui lòng nhập độ chế tác',
                'dochoi.required' => 'Vui lòng nhập độ chói',
                'dophatlua.required' => 'Vui lòng nhập độ phát lửa',
                'dolaplanh.required' => 'Vui lòng nhập độ lấp lánh',
                'huynhquang.required' => 'Vui lòng nhập huỳnh quang',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new Certificate();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm thành công!');
                return redirect()->route('route_BackEnd_Certificate_List');
            } else {
                Session::flash('error', 'Thêm không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.certificate.create');
    }

    public function edit($id)
    {
        $modelCertificate = new Certificate();
        $certificate = $modelCertificate->loadOne($id);
        $this->v['certificate'] = $certificate;
        return view('admin.certificate.edit', $this->v);
    }

    public function update($id, CertificateRequest $request)
    {

        $method_route = 'route_BackEnd_Certificate_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelCertificate = new Certificate();
        $res = $modelCertificate->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Certificate_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
}

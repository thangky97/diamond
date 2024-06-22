<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryProductRequest;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryProductController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $categoryProduct = DB::table('category_product')->orderBy('id', 'desc')
            ->paginate(10);


        return view('admin.category_product.list', compact('categoryProduct'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Category_Product_Create";

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:3',
            ], [
                'name.required' => 'Tên danh mục bắt buộc nhập!',
                'name.min' => 'Tên tối thiểu 3 ký tự!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new CategoryProduct();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm danh mục sản phẩm thành công!');
                return redirect()->route('route_BackEnd_Category_Product_List');
            } else {
                Session::flash('error', 'Thêm danh mục sản phẩm không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.category_product.create');
    }

    public function edit($id)
    {
        $modelCategoryProduct = new CategoryProduct();
        $categoryProduct = $modelCategoryProduct->loadOne($id);
        $this->v['categoryProduct'] = $categoryProduct;
        return view('admin.category_product.edit', $this->v);
    }

    public function update($id, CategoryProductRequest $request)
    {

        $method_route = 'route_BackEnd_Category_Product_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelCategoryProduct = new CategoryProduct();
        $res = $modelCategoryProduct->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Category_Product_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
}

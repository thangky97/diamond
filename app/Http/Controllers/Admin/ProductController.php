<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $products = Product::with('category_product')->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.products.list', compact('products'));
    }

    public function create(Request $request)
    {
        $method_route = "route_BackEnd_Products_Create";
        $category = DB::table('category_product')->get();

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:3|max:40',
                'price' => 'required|gte:0',
                // 'discount' => 'gte:0',
                // 'quantity' => 'gte:0',
                'description' => 'required',
                'cate_id' => 'required',
                'images' =>
                [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
            ], [
                'name.required' => 'Tên sản phẩm bắt buộc nhập!',
                'name.min' => 'Tên tối thiểu 3 ký tự!',
                'name.max' => 'Tên tối đa là 40 ký tự!',
                'price.required' => 'Vui lòng nhập giá sản phẩm!',
                'price.gte' => 'Giá phải là số dương không âm',
                // 'discount.gte' => 'Giảm giá phải là số dương không âm',
                // 'quantity.gte' => 'Số lượng phải là số dương không âm',
                'description.required' => 'Vui lòng nhập mô tả!',
                'cate_id.required' => 'Vui lòng chọn danh mục!',
                'images.required' => 'Ảnh không được để trống!',
                'images.image' => 'Bắt buộc phải là ảnh!',
                'images.max' => 'Ảnh không được lớn hơn 2MB!',
            ], []);

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $params['cols']['image'] = $this->uploadFile($request->file('images'));
            }

            $modelTes = new Product();
            $res = $modelTes->saveNew($params);

            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm sản phẩm thành công!');
                return redirect()->route('route_BackEnd_Products_List');
            } else {
                Session::flash('error', 'Thêm sản phẩm không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.products.create', compact('category'));
    }

    public function edit($id)
    {
        $modelProduct = new Product();
        $product = $modelProduct->loadOne($id);
        $this->v['cate_id'] = DB::table('category_product')->get();
        $this->v['product'] = $product;
        return view('admin.products.edit', $this->v);
    }

    public function update($id, ProductRequest $request)
    {

        $method_route = 'route_BackEnd_Products_Edit';
        $params = [];

        $params['cols'] = $request->post();

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('images'));
        }

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelProduct = new Product();
        $res = $modelProduct->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Products_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('products', $fileName, 'public');
    }
}

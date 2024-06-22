<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->get();
        }

        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }

        $this->v['productDiscount'] = Product::where('status', '=', 1)->where('discount', '>', 0)->paginate(6);

        $this->v['categoryProduct'] = CategoryProduct::where('status', '=', 1)->paginate(3);

        $this->v['news'] = News::with('admin')->where('status', '=', 1)->paginate(5);

        return view('home', $this->v, compact('name', 'numberOfItemsInCart'));
    }

    public function search(Request $request)
    {
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->get();
        }

        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }

        return view('client.search', $this->v, compact('name', 'numberOfItemsInCart'));
    }
}

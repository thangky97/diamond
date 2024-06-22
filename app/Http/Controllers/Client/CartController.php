<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
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
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->paginate(10);
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        }

        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }

        return view('client.cart', $this->v, compact('name', 'numberOfItemsInCart'));
    }

    //thêm vào giỏ hàng

    public function addCart(Request $request)
    {
        if (!$request->session()->has('cart')) {
            $request->session()->put('cart', []); // Nếu giỏ hàng chưa tồn tại thì tạo mới và ngược lại
        }

        $id = $request->input('id');
        $name = $request->input('name');
        $amount = $request->input('amount');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $image = $request->input('image');
        $total_price = $price - $discount;
        $total_payment = ($price - $discount) * $amount;
        $cc = 0; // kiểm tra sp có trong giỏ hàng hay không?

        $cart = $request->session()->get('cart');
        // dd($cart);

        for ($i = 0; $i < sizeof($cart); $i++) {
            if ($cart[$i][2] == $name) {
                $cc = 1;
                $soluongnew = $amount + $cart[$i][4];
                $cart[$i][4] = $soluongnew;
                $cart[$i][7] = ($price - $discount) * $soluongnew; // Cập nhật tổng giá mới
            }
        }

        // nếu không trùng sp trong giỏ hàng thì thêm mới
        if ($cc == 0) {
            // thêm mới sp vào giỏ hàng
            $sp = [$id, $image, $name, $price, $amount, $discount, $total_price, $total_payment];
            $cart[] = $sp;
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('route_FrontEnd_Cart');
    }

    //Trang giỏ hàng
    public function cart(Request $request)
    {
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->paginate(10);
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        }

        $cart = $request->session()->get('cart'); // Lấy giỏ hàng từ session

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }

        if (isset($_SESSION['cart'])) {
            return view('client.cart', $this->v, [
                'cart' => $_SESSION['cart'],
                'name' => $name,
                'numberOfItemsInCart' => $numberOfItemsInCart,
            ]);
        }
    }

    //xoá 1 sp trong cart
    public function cartDelete($id)
    {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (isset($id) && $id >= 0 && $id < count($_SESSION['cart'])) {
                array_splice($_SESSION['cart'], $id, 1);
            }
        }
        return redirect()->back();
    }

    //delete all product in cart
    public function cartDeleteAll()
    {
        unset($_SESSION['cart']);

        return redirect()->back();
    }
}

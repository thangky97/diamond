<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function getRegister(Request $request)
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

        return view('client.auth.register', $this->v, compact('name', 'numberOfItemsInCart'));
    }

    public function postRegister(Request $request)
    {
        $method_route = 'getRegister';

        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'username' => 'required|min:3|max:40',
                    'email' => 'required|email|max:50|unique:users',
                    'password' => 'required|min:6',
                ],
                [
                    'username.required' => 'Tên bắt buộc nhập!',
                    'username.min' => 'Tên tối thiểu 3 ký tự!',
                    'username.max' => 'Tên tối đa là 40 ký tự!',
                    'email.required' => 'Email bắt buộc nhập!',
                    'email.unique' => 'Email đã tồn tại!',
                    'email.email' => 'Email không đúng định dạng!',
                    'email.max' => 'Email tối đa 50 ký tự!',
                    'password.required' => 'Mật khẩu bắt buộc nhập!',
                    'password.min' => 'Mật khẩu tối thiểu 6 ký tự!',
                ],
                [],
            );

            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $modelTes = new User();
            $res = $modelTes->saveNewUser($params);

            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Đăng ký thành công');
                return redirect()->route('route_FrontEnd_Login');
            } else {
                Session::flash('error', 'Lỗi đăng ký tài khoản ');
                return redirect()->route($method_route);
            }
        }
        return view('route_FrontEnd_Login');
    }
}

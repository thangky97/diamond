<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $user = auth()->user(); // Giả định người dùng đã đăng nhập

        if (!$user) {
            return redirect()->route('route_FrontEnd_Login')->with('error', 'Vui lòng đăng nhập để tiếp tục mua hàng');
        }

        $order = Order::create([
            'email' => $user->email,
            'address' => "Hà Nội",
            'phone' => $user->phone,
            'note' => $request->note,
            'payment_type' => 'offline', // hoặc phương thức thanh toán khác nếu có
            'status' => 0,
        ]);

        foreach ($cart as $item) {
            OrderDetail::create([
                'product_id' => $item[0],
                'user_id' => $user->id,
                'order_id' => $order->id,
                'quantity' => $item[4],
                'price' => $item[6],
                'total_payment' => $item[7],
                'discount' => $item[5],
            ]);
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        $request->session()->forget('cart');

        return redirect()->route('route_FrontEnd_Home');
    }
}

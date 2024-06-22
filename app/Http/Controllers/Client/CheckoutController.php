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

    //checkout
    public function index(Request $request)
    {
        $name = $request->get('name');
        if ($name) {
            $this->v['listProduct'] = Product::where('name', 'like', '%' . $name . '%')->paginate(10);
        } else {
            $this->v['listProduct'] = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        }

        // Lấy giỏ hàng từ session
        $cart = $request->session()->get('cart', []);

        if (is_array($cart)) {
            $numberOfItemsInCart = count($cart); // Đếm số lượng sản phẩm trong giỏ hàng
        } else {
            $numberOfItemsInCart = 0; // Nếu $cart không phải là mảng, số lượng sản phẩm trong giỏ hàng là 0
        }

        // Chuyển sang trang thanh toán với dữ liệu giỏ hàng
        return view('client.checkout', $this->v, compact('cart', 'name', 'numberOfItemsInCart'));
    }

    public function checkout(CheckoutRequest $request)
    {
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $note = $request->note;

        $cart = $request->session()->get('cart', []);

        $user_profile = DB::table('users')->where('email', '=', $email)->first();

        if (empty($user_profile)) {
            $user = User::create($request->all());

            $order = Order::create([
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'note' => $request->note,
                'payment_type' => $request->payment_type,
                'status' => 0,
            ]);

            foreach ($cart as $index => $item) {
                $orderDetail = OrderDetail::create([
                    'product_id' => $item[0],
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'quantity' => $item[4],
                    'price' => $item[6],
                    'total_payment' => $item[7],
                    'discount' => $item[5],
                ]);

                // Lưu thông tin chi tiết của từng sản phẩm vào mảng $orderDetails
                $orderDetails[] = $orderDetail;
            }

            $this->v['totalPayment'] = 0;
            $this->v['paymentType'] = $request->payment_type;

            foreach ($orderDetails as $orderDetail) {
                $this->v['totalPayment'] += $orderDetail->total_payment; // Cộng tổng giá của các sản phẩm
            }

            $this->v['products'] = DB::table('products')->get();
            $this->v['detailOrder'] = $orderDetails;
            $this->v['user'] = User::find($user->id);

            Mail::send('email.order', $this->v, function ($email) {
                $email->subject('Đơn đặt hàng của bạn!');
                $email->to($email, 'Sell');
            });

            return view('client.thank_you');
        } else {
            User::where('email', $email)->update(['lastName' => $user_profile->lastName, 'firstName' => $user_profile->firstName, 'phone' => $user_profile->phone, 'email' => $user_profile->email, 'address' => $address]);

            $order = Order::create([
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'note' => $request->note,
                'payment_type' => $request->payment_type,
                'status' => 0,
            ]);

            foreach ($cart as $index => $item) {
                $orderDetail = OrderDetail::create([
                    'product_id' => $item[0],
                    'user_id' => $user_profile->id,
                    'order_id' => $order->id,
                    'quantity' => $item[4],
                    'price' => $item[6],
                    'total_payment' => $item[7],
                    'discount' => $item[5],
                ]);

                // Lưu thông tin chi tiết của từng sản phẩm vào mảng $orderDetails
                $orderDetails[] = $orderDetail;
            }

            $this->v['totalPayment'] = 0;
            $this->v['paymentType'] = $request->payment_type;

            foreach ($orderDetails as $orderDetail) {
                $this->v['totalPayment'] += $orderDetail->total_payment; // Cộng tổng giá của các sản phẩm
            }

            $this->v['products'] = DB::table('products')->get();

            $this->v['detailOrder'] = $orderDetails;

            $this->v['user'] = User::find($user_profile->id);

            $this->v['email'] = $user_profile->email;

            Mail::send('email.order', $this->v, function ($email) {
                $email->subject('Đơn đặt hàng của bạn!');
                $email->to($this->v['email'], 'Sell');
            });

            return view('client.thank_you');
        }

        // Chuyển sang trang thanh toán với dữ liệu giỏ hàng
        return view('client.checkout', $this->v, compact('name', 'user_profile'));
    }
}

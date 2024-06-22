<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $order = Order::with('orderDetail')->orderBy('id', 'desc')->paginate(20);

        return view('admin.order.list', compact('order'));
    }

    public function edit($id)
    {
        $modelOrder = new Order();
        $this->v['orders'] = $modelOrder->loadOne($id);

        //ds order detail
        $this->v['orderDetail'] = OrderDetail::with('user')->with('product')->with('order')
            ->where('order_id', '=', $this->v['orders']->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.order_detail.list', $this->v);
    }

    public function update($id, Request $request)
    {

        $method_route = 'route_BackEnd_Orders_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelNew = new Order();
        $res = $modelNew->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật đơn hàng thành công!');
            return redirect()->route('route_BackEnd_Orders_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    // public function pdf($id)
    // {
    //     $modelOrder = new Order();
    //     $this->v['orders'] = $modelOrder->loadOne($id);

    //     $data['title'] = 'Hoá đơn';
    //     $data['orderDetail'] =  OrderDetail::with('user')->with('product')->with('order')
    //         // ->where('order_id', '=', $this->v['orders']->id)
    //         ->orderBy('id', 'desc')
    //         ->get();

    //     $pdf = PDF::loadView(['data', $data])->setOptions(['defaultFont' => 'sans-serif']);

    //     return $pdf->download('invoice.pdf');
    // }

    public function pdf($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }
    public function print_order_convert($id)
    {
        $order = new Order();
        $this->v['orders'] = $order->loadOne($id);

        $this->v['orderDetail'] = OrderDetail::with('user')->with('product')->with('order')
            ->where('order_id', '=', $this->v['orders']->id)
            ->orderBy('id', 'desc')
            ->get();

        $this->v['listProducts'] = Product::get();

        $orderDetails = OrderDetail::find($id);
        $this->v['orderDetails'] = $orderDetails;

        $order = Order::find($id);
        $this->v['order'] = $order;

        $this->v['user'] = User::find($this->v['orderDetails']->user_id);

        $output = '';
        $output .= '
        <title>Đơn hàng</title>
        <style>body{
            font-family:DejaVu Sans;
        }
        h2 {
            text-align: center;
        }
        i {
            font-size : 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
          }

          td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 0 8px 8px 8px;
          }

          tr:nth-child(even) {
            background-color: #dddddd;
          }
        </style>';

        $statusText = '';
        if ($this->v['order']['status'] == 0) {
            $statusText = 'Đang chờ';
        } elseif ($this->v['order']['status'] == 1) {
            $statusText = 'Đã hoàn thành';
        } else {
            $statusText = 'Huỷ';
        }
        $output .= '

        <h2>Thông tin đơn hàng</h2>

        <i>Khách hàng: ' . $this->v['user']['username'] . '</i><br>
        <i style="text-align:right;">Số điện thoại: ' . $this->v['user']['phone'] . '</i><br>
        <i >Email: ' . $this->v['user']['email'] . '</i><br>
        <i ">Địa chỉ: ' . $this->v['user']['address'] . '</i>
        <i ">Ghi chú: ' . $this->v['user']['note'] . '</i>

        <div>
        <h5>
            <i class="far fa-calendar-minus scale3 me-3"></i>
            Trạng thái đơn hàng: ' . $statusText . '
        </h5>
    
        </div>

        <table>
            <thead>
                <tr>
                    <th >Đơn hàng</th>
                    <th >Tên sản phẩm</th>
                    <th >Số lượng</th>
                    <th >Giá</th>
                    <th>Giảm giá</th>
                    <th >Tổng đơn hàng</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($this->v['orderDetail'] as $order) {

            $output .= '
                            <tr>
                            <td>
                                <span class="d-block guest-bx" style="color: #0099FF;">' . $order->id . '</span>
                            </td>
                            <td>
                                <div class="guest-bx">
                                    <img src="" alt="">
                                    <div>
                                        <h4 class="mb-0 mt-1"><a class="text-black" href="">' . $order->product->name . '</a></h4>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-primary d-block guest-bx">' . $order->quantity . '<br></span>
                            </td>
                            <td>
                                <span class="text-primary d-block guest-bx">' . number_format($order->price) . 'đ<br></span>
                            </td>
                            <td>
                                <span class="text-primary d-block guest-bx">' . number_format($order->discount) . 'đ<br></span>
                            </td>
                            <td>
                                <span class="text-danger d-block guest-bx">' . number_format($order->total_payment) . 'đ<br></span>
                            </td>
                        </tr>';
        }


        $total_paymeny = 0;
        $total_paymeny += $order->total_payment;
        $output .= '
                </tbody>
            </table>
            <div style="text-align:center;">
                <div class="me-10 mb-sm-0 mb-3">
                    <h3 class="mb-2">Tổng thanh toán</h3>
                    <hr style="width:10%;" >
                    <h3 class="mb-0 card-title" style="color: blue;"><b><var>' . number_format($total_paymeny) . 'đ</var></b></h3>
                </div>
            </div>
        ';

        return $output;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        //tổng số đơn hàng Pending hôm nay
        $this->v['countOrderPendingToday'] = Order::where('status', '=', 0)
            ->whereDate('created_at', today())
            ->count();

        //tổng số đơn hàng Success hôm nay
        $this->v['countOrderSuccessToday'] = Order::where('status', '=', 1)
            ->whereDate('created_at', today())
            ->count();

        //tổng số đơn hàng Cancel hôm nay
        $this->v['countOrderCancelToday'] = Order::where('status', '=', 2)
            ->whereDate('created_at', today())
            ->count();

        //tổng số KH hôm nay
        $this->v['countCustomerToday'] = User::where('role', '=', 4)
            ->whereDate('created_at', today())
            ->count();

        // Thời gian bắt đầu và kết thúc của tháng trước
        $startOfMonth = now()->subMonth()->startOfMonth();
        $endOfMonth = now()->subMonth()->endOfMonth();

        // Tính tổng số đơn hàng và tổng tiền theo status trong tháng trước
        $this->v['totalPaymentMonthPending'] = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
            ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
            ->where('orders.status', 0)
            ->sum('orders_detail.total_payment');

        $this->v['totalOrderPendingMonth'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 0)
            ->count();

        //success
        $this->v['totalPaymentMonthSuccess'] = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
            ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
            ->where('orders.status', 1)
            ->sum('orders_detail.total_payment');

        $this->v['totalOrderSuccessMonth'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 1)
            ->count();

        //cancel
        $this->v['totalPaymentMonthCancelled'] = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
            ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
            ->where('orders.status', 2)
            ->sum('orders_detail.total_payment');

        $this->v['totalOrderCancelMonth'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 2)
            ->count();

        return view('admin.dashboard', $this->v);
    }

    public function export()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function exportOrder()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class VanChuyenController extends Controller
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

        return view('client.van_chuyen', compact('name'));
    }
}

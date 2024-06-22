<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class ContactController extends Controller
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

        return view('client.contact', compact('name'));
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'required',
        ];

        $messages = [
            'name.required' => 'Không được bỏ trống tên!',
            'email.required' => 'Không được bỏ trống email!',
            'email.email' => 'Email không đúng định dạng!',
            'phone.required' => 'Không được bỏ trống số điện thoại!',
            'content.required' => 'Không được bỏ trống nội dung!',
        ];
        $validatedData = $request->validate($rules, $messages);

        $data = new Contact(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'content' => $request->content,
                'status' => 0,
            ]
        );
        $data->save();

        return redirect()->route('route_FrontEnd_Contact')
            ->with('success', 'Gửi thành công! Chúng tôi sẽ phản hồi sớm nhất');
    }
}

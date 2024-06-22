<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $contact = Contact::orderBy('id', 'desc')->paginate(10);

        return view('admin.contact.list', compact('contact'));
    }

    public function edit($id)
    {
        $modelContact = new Contact();
        $contact = $modelContact->loadOne($id);
        $this->v['contact'] = $contact;
        return view('admin.contact.edit', $this->v);
    }

    public function update($id, ContactRequest $request)
    {

        $method_route = 'route_BackEnd_Contact_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelContact = new Contact();
        $res = $modelContact->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Contact_List');
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;


class ManageAdminController extends Controller
{
    //
    function showAdminList(){
        $admin_list = Admin::orderBy("id", "desc")->paginate(10);
        return view("admin.admin_list", [
            "admin_list" => $admin_list
        ]);
    }

    public function add()
    {
        return view('admin.admin_add');
    }

    public function create(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();
        return redirect('/admin');
    }
}

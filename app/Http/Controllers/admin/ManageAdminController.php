<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;


class ManageAdminController extends Controller
{
    //
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

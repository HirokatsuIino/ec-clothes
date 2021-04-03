<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;


class ManageAdminController extends Controller
{
    //
    public function showAdminList(Request $request){
        $keyword = $request->input('keyword');
        $query = Admin::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }else{
            $query->orderBy("id", "desc");
        }
        $admin_list = $query->paginate(10);

        return view("admin.admin_list", [
            "admin_list" => $admin_list,
            "keyword" => $keyword,
        ]);
    }

    public function showAdminDetail($id){
        $admin = Admin::find($id);
        return view("admin.admin_detail", [
            "admin" => $admin
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

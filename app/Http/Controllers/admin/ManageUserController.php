<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ManageUserController extends Controller
{
    //
    public function showUserList(Request $request){

        $keyword = $request->input('keyword');
        $query = User::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }else{
            $query->orderBy("id", "desc");
        }
        $user_list = $query->paginate(10);

        return view("admin.user_list", [
            "user_list" => $user_list,
            "keyword" => $keyword,
        ]);
    }
    public function showUserDetail($id){
        $user = User::find($id);
        return view("admin.user_detail", [
            "user" => $user
        ]);
    }
    public function showUserCount(){
        $user_count = User::all()->select('count(*)');
        return view("admin.admintop", [
            "user_count" => $user_count
        ]);
    }

    public function add()
    {
        return view('admin.user_add');
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('/admin');
    }




}

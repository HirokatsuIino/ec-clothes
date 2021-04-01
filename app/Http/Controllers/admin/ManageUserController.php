<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ManageUserController extends Controller
{
    //
    public function showUserList(){
        $user_list = User::orderBy("id", "desc")->paginate(10);
//        $user_count = User::COUNT();

//        dd($user_count);
        return view("admin.user_list", [
            "user_list" => $user_list,
//            "user_count" => $user_count
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
        return redirect('/');
    }




}

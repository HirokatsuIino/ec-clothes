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
        return view("admin.user_list", [
            "user_list" => $user_list
        ]);
    }
    public function showUserDetail($id){
        $user = User::find($id);
        return view("admin.user_detail", [
            "user" => $user
        ]);
    }
}

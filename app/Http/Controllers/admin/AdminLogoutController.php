<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminLogoutController extends Controller
{
    //
    public function logout(Request $request){
        return view("admin.admin_logout");
    }
}

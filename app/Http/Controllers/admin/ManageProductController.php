<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ManageProductController extends Controller
{
    //
    public function showProductList(Request $request){
        $keyword = $request->input('keyword');
        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }else{
            $query->orderBy("id", "desc");
        }
        $product_list = $query->paginate(10);

        return view("admin.product_list", [
            "product_list" => $product_list,
            "keyword" => $keyword,
        ]);
    }
}

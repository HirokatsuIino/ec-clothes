<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ManageProductController extends Controller
{
    //
    public function add()
    {
        return view('admin.product_add');
    }

    public function create(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect('/admin/product_list');
    }

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

    public function showProductDetail($id){
        $product = Product::find($id);
        return view("admin.product_detail", ["product" => $product]);
    }
}

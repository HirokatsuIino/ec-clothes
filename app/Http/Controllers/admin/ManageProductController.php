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
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpeg'
        ]);
        $upload_image = $request->file('image');

        $file_path = '';
        if($upload_image) {
            //アップロードされた画像を保存する
            $file_path = $upload_image->storeAs('uploads/products', $upload_image->getClientOriginalName(), "public");
        }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $file_path;
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::all();
        return view("product.index", ["products" => $product]);
    }

    public function show($id)
    {

        $product = Product::find($id);
//        dd($product);
        return view("product.show", ["product" => $product]);
    }
}

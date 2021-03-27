<?php

namespace App\Http\Controllers;

use App\CartHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\LineItem;
use Illuminate\Support\Str;

class LineItemController extends Controller
{
    //
    public function create(Request $request)
    {
        $cart_id = Session::get('cart');
        $line_item = LineItem::where('cart_id', $cart_id)
            ->where('product_id', $request->input('id'))
            ->first();

        $randomkey='';
        if ($line_item) {
            $line_item->quantity += $request->input('quantity');
            $line_item->save();
        } else {
            LineItem::create([
                'cart_id' => $cart_id,
                'product_id' => $request->input('id'),
                'quantity' => $request->input('quantity'),
                'randomkey' => Str::random(32),
            ]);

            $randomkey =LineItem::select('randomkey')
                ->where('cart_id', $cart_id)
                ->where('product_id', $request->input('id'))
                ->where('quantity', $request->input('quantity'))
                ->get();
//            dd($randomkey);

//            foreach ($item as $db_test) {
//                dd($db_test);
//            }
        }
//        dd($cart_id);
//        $item = LineItem::where('cart_id', $cart_id)
//            ->where('product_id', $request->input('id'))
//            ->where('quantity', $request->input('quantity'));
//        dd($item->id);


        CartHistory::create([
            'cart_id' => $cart_id,
            'product_id' => $request->input('id'),
            'quantity' => $request->input('quantity'),
            'status' => '0', //カートに入っている状態
            'randomkey' => $randomkey,

        ]);


//        return redirect(route('product.index'));
        return redirect(route('cart.index'));
    }

    public function delete(Request $request)
    {
        LineItem::destroy($request->input('id'));

        return redirect(route('cart.index'));
    }
}

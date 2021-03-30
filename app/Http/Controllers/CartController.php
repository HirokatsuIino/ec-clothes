<?php

namespace App\Http\Controllers;

use App\CartHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\LineItem;

// Mailファサードをインポート.
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    //
    public function index()
    {
        $cart_id = Session::get('cart');
        $cart = Cart::find($cart_id);

        $total_price = 0;
        foreach ($cart->products as $product) {
            $total_price += $product->price * $product->pivot->quantity;
        }

        return view('cart.index')
            ->with('line_items', $cart->products)
            ->with('total_price', $total_price);
    }

    public function checkout()
    {
        $cart_id = Session::get('cart');
        $cart = Cart::find($cart_id);

        if (count($cart->products) <= 0) {
            return redirect(route('cart.index'));
        }


        $line_items = [];
        foreach ($cart->products as $product) {
            $line_item = [
                'name'        => $product->name,
                'description' => $product->description,
                'amount'      => $product->price,
                'currency'    => 'jpy',
                'quantity'    => $product->pivot->quantity,
            ];
            array_push($line_items, $line_item);
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [$line_items],
//            'success_url'          => route('product.index'),
            'success_url'          => route('cart.success'),
            'cancel_url'           => route('cart.index'),
        ]);

        return view('cart.checkout', [
            'session' => $session,
            'publicKey' => env('STRIPE_PUBLIC_KEY')
        ]);
    }
    public function show_history()
    {

        $list = LineItem::leftJoin('products', 'line_items.product_id', '=', 'products.id')
            ->select('line_items.*', 'line_items.created_at as order_day', 'products.*')
            ->get();


//        $list = LineItem::where('cart_id', $cart_id);
//        $list = LineItem::all();
//        dd($list);
        return view("cart.show_history", ["lists" => $list]);

    }

    public function success(Request $request)
    {
        $cart_id = Session::get('cart');
//        dd($cart_id, $request->product_id);

//        $cart_id = 1;
//        $list = CartHistory::find($cart_id);
//
//        dd($cart_id, $list);


//        $carthistory = CartHistory::find($cart_id);
//        dd($carthistory);
//        $carthistory->status = '1';
//        $carthistory->save();
//        $item =LineItem::select('id')->where('cart_id', $cart_id)->get();
//        dd($item);

//        $list = CartHistory::where('cart_id', $cart_id)->get();
//        foreach ($list as $db_test) {
//            $db_test->status = 1;
//            $db_test->save();
////            dd('end');
//        }

//        LineItem::where('cart_id', $cart_id)->delete();
        $list = LineItem::where('cart_id', $cart_id)->get();
        foreach ($list as $db_test) {
            $db_test->status = 1;
            $db_test->save();
//            dd('end');
        }

        //        $list->save();
//        dd($list);


        // Mail::sendで送信できる.
        // 第1引数に、テンプレートファイルのパスを指定し、
        // 第2引数に、テンプレートファイルで使うデータを指定する
//        Mail::send('emails.user_register', [
//            "message" => "こんにちは！"
//
//        ], function($message) {
//
//            // 第3引数にはコールバック関数を指定し、
//            // その中で、送信先やタイトルの指定を行う.
//            $message
//                ->to('product01boost@gmail.com')
//                ->bcc('admin@sample.com')
//                ->subject("ご購入ありがとうございます");
//        });

        return redirect(route('product.index'));
    }
}

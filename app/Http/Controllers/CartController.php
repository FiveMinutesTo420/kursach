<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function __invoke()
    {
        $user_cart_items = auth()->user()->cart->where('order_id', null);
        $not_in_stock = false;

        foreach ($user_cart_items as $cart) {
            if ($cart->count > $cart->item->in_stock) {
                $not_in_stock = true;
            }
        }
        return view('cart', compact('user_cart_items', 'not_in_stock'));
    }
    public function change_amount(Request $request)
    {
        $data = $request->all();
        $user = auth()->user();
        $message = array();
        if (is_numeric($data['amount']) && is_numeric($data['id'])) {

            $cart = Cart::find(intval($data['id']));

            $cart->count = $data['amount'];
            $message['new_price'] = number_format($data['amount'] * $cart->item->price);

            $cart->save();
            $message['all'] = 'good';

            if ($cart->count > $cart->item->in_stock) {
                $message['status'] = "bigger";
                $message['add_error'] = "cart" . $cart->id;
                $message['add_error_class'] = "error" . $cart->id;
            } else {
                $message['status'] = "ok";
                $message['remove_id'] = "error" . $cart->id;
            }
            foreach ($user->cart->where('order_id', null) as $cart) {
                if ($cart->count > $cart->item->in_stock) {
                    $message['all'] = "bad";
                }
            }
            $all = 0;
            foreach (auth()->user()->cart->where('order_id', null) as $cart) {
                $all += $cart->count * $cart->item->price;
            }
            $message['new_total'] = number_format($all);
            return json_encode($message);
        }
    }
}

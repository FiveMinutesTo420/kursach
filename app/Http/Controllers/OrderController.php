<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->has('sort')) {
            if ($request->sort == "new") {
                return view('orders', ['orders' => auth()->user()->orders->sortByDesc('id')->where('status', 'Новый')]);
            } else if ($request->sort == "canceled") {
                return view('orders', ['orders' => auth()->user()->orders->sortByDesc('id')->where('status', 'Отменен')]);
            } else if ($request->sort == "submitted") {
                return view('orders', ['orders' => auth()->user()->orders->sortByDesc('id')->where('status', 'Подтвержден')]);
            }
        }
        return view('orders', ['orders' => auth()->user()->orders->sortByDesc('id')]);
    }
    public function create(Request $request)
    {
        $order = Order::create(['user_id' => auth()->user()->id]);

        foreach (auth()->user()->cart as $cart) {

            if ($cart->order_id == null) {
                if ($cart->item->in_stock < $cart->count) {
                    $order->delete();
                    return back()->with('error', "Товара нехватает в наличии!");
                }

                $cart->order_id = $order->id;
                $cart->save();
            }
        }
        return back()->with('success', "Заказ успешно оформлен!");
    }
    public function cancel(Request $request, Order $order)
    {
        $order->delete();

        return back()->with('success', "Заказ удален!");
    }
}

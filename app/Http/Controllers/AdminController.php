<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;

class AdminController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = Order::orderByDesc('id')->get();
        $products = Product::all();

        if ($request->has('sort')) {
            if ($request->sort == "new") {
                return view('admin.admin', ['orders' => $orders->sortByDesc('id')->where('status', 'Новый')]);
            } else if ($request->sort == "canceled") {
                return view('admin.admin', ['orders' => $orders->sortByDesc('id')->where('status', 'Отменен')]);
            } else if ($request->sort == "submitted") {
                return view('admin.admin', ['orders' => $orders->sortByDesc('id')->where('status', 'Подтвержден')]);
            }
        }


        return view('admin.admin', compact('products', 'orders'));
    }
    public function changeOrderStatus(Request $request, Order $order)
    {
        if ($request->get('action') == "Отменить") {
            if (str_replace(' ', '', $request->get('comment')) == "") {
                return back()->with('error', "Добавьте комментарий");
            }
            $order->status = "Отменен";
            $order->comment = $request->get('comment');
            $order->save();
            return back()->with('success', 'Заказ №' . $order->id . ' был отменен');
        } elseif ($request->get('action') == "Подтвердить") {
            $order->status = "Подтвержден";
            //$order->comment = $request->get('comment');
            $order->save();
            return back()->with('success', 'Заказ №' . $order->id . ' был подтвержден');
        }
    }
    public function deleteCategory(Category $category)
    {
        foreach ($category->products as $product) {
            $product->delete();
        }
        $category->delete();
        return back()->with('success', "Категория и его товары удалены");
    }
}

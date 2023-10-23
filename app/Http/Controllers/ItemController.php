<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    public function show(Product $item)
    {
        return view("item", compact('item'));
    }
    public function addToCart(Request $request, Product $item)
    {
        if ($row = Cart::where('item_id', $item->id)->where('order_id', null)->first()) {

            if ($request->count < $item->in_stock) {
                $row->count = $row->count + $request->count;
                $item->in_stock -= $request->count;
                $item->save();
                $row->save();
                return Redirect::back()->withSuccess("Корзина обновлена!");
            } else {
                return Redirect::back()->with('error', "Товара не хватает в наличии!");
            }
        } else {
            if ($item->in_stock > $request->count) {
                Cart::create([
                    "user_id" => auth()->user()->id,
                    "item_id" => $item->id,
                    "count" => $request->count,
                ]);
                $item->in_stock -= $request->count;
                $item->save();

                return Redirect::back()->withSuccess("Товар добавлен в корзину");
            }

            return Redirect::back()->with('error', "Товара не хватает в наличии!");
        }
    }
    public function search(Request $request)
    {
        $items = Product::where('name', 'like', '%' . $request->text . '%')->where('in_stock', '>', 0)->get();
        $url = route("search_p", ['q' => $request->text]);

        if ($items) {
            if (count($items) != 0) {
                $response = array("message" => "good", "products" => $items->take(5), 'amount' => count($items), 'url' => $url);
            } else {
                $response = array("message" => "not_found", 'amount' => '0', 'url' => $url);
            }
        } else {
            $response = array("message" => "bad");
        }
        return json_encode($response);
    }
    public function search_p(Request $request)
    {
        if ($request->has('q')) {
            $query = $request->q;
            $items = Product::where('name', 'like', '%' . $query . '%')->get();
            return view('search', compact('items', 'query', 'items'));
        } else {
            return redirect()->route('home');
        }
    }
    public function get(Request $request)
    {
        $item = Product::find($request->id);
        return json_encode(array('name' => $item->name));
    }
    public function delete_item_from_cart(Request $request, Cart $item)
    {
        $item->item->in_stock += $item->count;
        $item->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id,$size)
    {
        $product = Product::find($id);
        Cart::add($product->id, $product->name_product, 1, $product->unit_price, ['images' => $product->image,'size' => $size]);
        $count = Cart::count();
        return response([
          'count' => $count,
          'size' => $size,
          'items' => view('cart')->render()
        ], 200);
    }

    public function checkout()
    {

       return view('user.shop.checkout');
    }

    public function down_count($rowId)
    {

        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty - 1);
        $total = Cart::total();
        $count = Cart::count();
        return response([
          'count' => $count,
          'qty' => $item->qty,
          'subtotal' => $item->subtotal,
          'total' => $total], 200
        );
     }

    public function up_count($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty + 1);
        $total = Cart::total();
        $count = Cart::count();
        return response([
          'count' => $count,
          'qty' => $item->qty,
          'subtotal' => $item->subtotal,
          'total' => $total], 200);
    }

    public function delete($rowId)
    {
      	Cart::remove($rowId);
      	return redirect('/carts/checkout');
    }
}

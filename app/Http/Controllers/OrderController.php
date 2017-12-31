<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Branch;
use App\Order;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    Public function allOrder()
    {
        $orders = Order::paginate(10);
         // dd($orders);
        return view('auth.admin.order.list_order', compact('orders'));
    }

    public function searchOrders(Request $request)
    {
      $date_start = $request->Input('date_start');
      $date_end = $request->Input('date_end');
      $order = Input::get ( 'search_order' );
      $orderUpercase = Str::lower($order);
      if(empty($date_start) && empty($date_end))
      {
        $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                            ->where('note','LIKE','%'.$order.'%')
                            ->orwhere('users.name','LIKE','%'.$order.'%')
                            ->orWhere('note','LIKE','%'.$orderUpercase.'%')
                            ->paginate(10);
                            $sum =0;
          foreach ($orders as $key => $order) {
              $sum = $sum+$order->total;
          }
          dd($sum);
            return view('auth.admin.order.list_order',compact('orders'));
      }
      elseif (empty($date_end)) {
            $orders = Order::where('date_order', '>=', $date_start )
            ->orderBy('date_order','asc')
            ->paginate(10);
            return view('auth.admin.order.list_order',compact('orders'));
      }
      elseif (empty($date_start)) {
          $orders = Order::where('date_order', '<=', $date_end)
          ->orderBy('date_order','asc')
          ->paginate(10);
          return view('auth.admin.order.list_order',compact('orders'));
      }
      else {
        $orders = Order::where('date_order', '>=', $date_start)
        ->where('date_order', '<=', $date_end)
        ->orderBy('date_order','asc')
        ->paginate(10);
        return view('auth.admin.order.list_order',compact('orders'));
      }


    }
}

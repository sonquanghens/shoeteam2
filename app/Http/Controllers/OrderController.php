<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Branch;
use App\Order;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Str;
use Toastr;

class OrderController extends Controller
{

    Public function allOrder()
    {
        $orders = Order::paginate(10);
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
        //there are not date_end and date_start , but there is Name_search
        $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                            ->where('note','LIKE','%'.$order.'%')
                            ->orwhere('users.name','LIKE','%'.$order.'%')
                            ->orWhere('note','LIKE','%'.$orderUpercase.'%')
                            ->paginate(10);
        $sum_orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                            ->where('note','LIKE','%'.$order.'%')
                            ->orwhere('users.name','LIKE','%'.$order.'%')
                            ->orWhere('note','LIKE','%'.$orderUpercase.'%')
                            ->get();
                            // dd($sum_orders);


          $sum_total =0;
          foreach ($sum_orders as $key => $order) {
              $sum_total = $sum_total + $order->total;
          }

            return view('auth.admin.order.list_order',compact('orders','sum_total' ));
      }
      elseif (empty($date_end)) {
        //there are not date_end but there is date_start
            $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->where('users.name','LIKE','%'.$order.'%')
            ->where('date_order', '>=', $date_start )
            ->orderBy('date_order','asc')
            ->paginate(10);

            // sum total
            $sum_orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->where('users.name','LIKE','%'.$order.'%')
            ->where('date_order', '>=', $date_start )
            ->orderBy('date_order','asc')
            ->get();
            $sum_total =0;
            foreach ($sum_orders as $key => $order) {
                $sum_total = $sum_total + $order->total;
            }


              return view('auth.admin.order.list_order',compact('orders','sum_total'));

      }
      elseif (empty($date_start)) {
        //there is date_end no date_end and no Name_search
          $orders = Order::where('date_order', '<=', $date_end)
          ->orderBy('date_order','asc')
          ->paginate(10);

          //sum Total
          $sum_orders = Order::where('date_order', '<=', $date_end)
          ->orderBy('date_order','asc')
          ->get();
          $sum_total =0;
          foreach ($sum_orders as $key => $order) {
              $sum_total = $sum_total + $order->total;
          }
          return view('auth.admin.order.list_order',compact('orders','sum_total'));
      }
      else {
        // there are date_end and date_start no Name_search
        $orders = Order::where('date_order', '>=', $date_start)
        ->where('date_order', '<=', $date_end)
        ->orderBy('date_order','asc')
        ->paginate(10);

        //total sum
        $sum_orders = Order::where('date_order', '>=', $date_start)
        ->where('date_order', '<=', $date_end)
        ->orderBy('date_order','asc')
        ->get();
        $sum_total =0;
        foreach ($sum_orders as $key => $order) {
            $sum_total = $sum_total + $order->total;
        }
        return view('auth.admin.order.list_order',compact('orders','sum_total'));
      }


    }
}

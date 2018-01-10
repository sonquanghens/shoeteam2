<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use App\Http\Requests\CustomerRequests;
use App\Order;
use App\Product;
use App\Branch;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Str;
use Toastr;
use App\OrderDetail;
use DateTime;
use Auth;
use Excel;
use PDF;
use Twilio;
use App\User;
class OrderController extends Controller
{
    public function SaveOrder(CustomerRequests $request)
    {
       $name = $request->Input('name_receiver');
       $datetime = new DateTime;
        $NewDate=Date('y-m-d', strtotime("+3 days"));
        //dd($NewDate);
       if(isset(Auth::user()->id))
       {
         $id_user = Auth::user()->id;
       }
       else {
         $id_user = "";
       }
        $data = [
          'user_id' =>  $id_user,
          'date_order' => $datetime->format('Y-m-d'),
          'total' => Cart::total(0, '', ''),
          'name_receiver' => $name,
          'phone' => $request->Input('phone'),
          'address_recevie' => $request->Input('adress'),
          'ship_date' => $NewDate,
          'note' => '1',
          'status' => 1,
        ];

       $order = Order::create($data);

       $content = Cart::content();
       foreach ($content as $item) {
           OrderDetail::create([
             'order_id' => $order->id,
             'product_id' => $item->id,
             'quantily' => $item->qty,
             'unit_price' => number_format($item->subtotal, 0,'',''),
             'size' => $item->options->size,
           ]);
           $product = Product::find($item->id);
           $product->update(['count' => $product->count + 1]);
       }
       $items = OrderDetail::where('order_id', '=', $order->id)->get();
      // dd($order->user->name.' vua dat mot don hang . Tong tien :'.$order->total);
       Twilio::message('+84'.Auth::user()->phone_number, $order->user->name.' vua dat mot don hang . Tong tien :'.$order->total.' VND');
       Cart::destroy();
       return view('user.shop.manage-detail')->with('items', $items);
    }

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
      $status = Input::get ( 'note' );
      $orderUpercase = Str::lower($order);
      // dd($date_start);
      if (!empty($status)) {

          if (!empty($date_end) && !empty($date_start)) {
            //there are Search with note
            $orders = Order::where('status','LIKE','%'.$status.'%')
                                ->where('date_order', '>=', $date_start)
                                ->where('date_order', '<=', $date_end)
                                ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
                                ->paginate(10);
            $sum_orders = Order::where('status','LIKE','%'.$status.'%')
                                ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
                                ->where('date_order', '>=', $date_start)
                                ->where('date_order', '<=', $date_end)
                                ->get();
                                // dd($sum_orders);
                 $sum_total =0;
              foreach ($sum_orders as $key => $order) {
                  $sum_total = $sum_total + $order->total;
              }
                return view('auth.admin.order.list_order',compact('orders','sum_total','date' ));
          }
          elseif (empty($date_start) && !empty($date_end)) {
            //there are Search with note
            $orders = Order::where('status','LIKE','%'.$status.'%')
                                ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
                                ->where('date_order', '<=', $date_end)
                                ->paginate(10);
            $sum_orders = Order::where('status','LIKE','%'.$status.'%')
                                ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
                                ->where('date_order', '<=', $date_end)
                                ->get();
                                // dd($sum_orders);
                 $sum_total =0;
              foreach ($sum_orders as $key => $order) {
                  $sum_total = $sum_total + $order->total;
              }
                return view('auth.admin.order.list_order',compact('orders','sum_total','date' ));
          }
          elseif (!empty($date_start) && empty($date_end)) {
            $orders = Order::where('status','LIKE','%'.$status.'%')
                                ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
                                ->where('date_order', '>=', $date_start)
                                ->paginate(10);
            $sum_orders = Order::where('status','LIKE','%'.$status.'%')
                                ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
                                ->where('date_order', '>=', $date_start)
                                ->get();
                                // dd($sum_orders);
                 $sum_total =0;
              foreach ($sum_orders as $key => $order) {
                  $sum_total = $sum_total + $order->total;
              }
                return view('auth.admin.order.list_order',compact('orders','sum_total','date' ));
          }
          elseif (empty($date_start) && empty($date_end)) {
            $orders = Order::where('status','LIKE','%'.$status.'%')
                                ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
                                ->paginate(10);
            $sum_orders = Order::where('status','LIKE','%'.$status.'%')
                                ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
                                ->get();
                                // dd($sum_orders);
                 $sum_total =0;
              foreach ($sum_orders as $key => $order) {
                  $sum_total = $sum_total + $order->total;
              }
                return view('auth.admin.order.list_order',compact('orders','sum_total','date' ));
          }

      }
      else {
        if(empty($date_start) && empty($date_end))
        {

          $orders = Order::whereHas('user', function ($query) use ($order)
                                  {
                                      $query->where('name', 'LIKE', '%' . $order . '%');
                                  })
                              ->paginate(10);
          $sum_orders = Order::whereHas('user', function ($query) use ($order)
                                  {
                                      $query->where('name', 'LIKE', '%' . $order . '%');
                                  })
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
              $orders = Order::where('date_order', '>=', $date_start )
              ->whereHas('user', function ($query) use ($order)
                                      {
                                          $query->where('name', 'LIKE', '%' . $order . '%');
                                      })
              ->orderBy('date_order','asc')
              ->paginate(10);

              // sum total
              $sum_orders = Order::where('date_order', '>=', $date_start )
              ->whereHas('user', function ($query) use ($order)
                                      {
                                          $query->where('name', 'LIKE', '%' . $order . '%');
                                      })
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
            ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
            ->orderBy('date_order','asc')
            ->paginate(10);
            //sum Total
            $sum_orders = Order::where('date_order', '<=', $date_end)
            ->whereHas('user', function ($query) use ($order)
                                    {
                                        $query->where('name', 'LIKE', '%' . $order . '%');
                                    })
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

      public function getOrder()
      {
        //dd(Cart::content());
          return view('user.shop.order');
      }

      public function manage()
      {
          // dd(auth::user()->id);
          $orders = Order::where('user_id', '=', auth::user()->id)->get();
          return view('user.shop.manage')->with('orders', $orders);
      }

      public function cancel($id)
      {
          $order = Order::find($id);
          $order->update(['status' => 3]);
          return redirect('carts/manage');
      }

      public function detail($id)
      {
          $items = OrderDetail::where('order_id', '=', $id)->get();
          return view('user.shop.manage-detail')->with('items', $items);
      }

      public function export_order()
      {
         $orders = Order::where('user_id', '=', auth::user()->id)->get();
         Excel::create('My Order', function($excel) use($orders) {
             $excel->sheet('Excel sheet', function($sheet) use($orders) {
                 $sheet->fromArray($orders);
             });
         })->export('xls');
         return redirect('carts/manage');
      }

      public function export_order_detail($order)
      {
         $items = OrderDetail::where('order_id', '=', $order)->get();
         $orders = Order::where('id','=',$order)->get();
         $pdf = PDF::loadView('user.pdf.order-detail', ['items' => $items,'orders' => $orders]);
         return $pdf->stream('order-detail.pdf');
      }

      public function searchNoteDone()
      {
            $status = "DONE";
            // dd($statusUpercase);
            $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                                ->where('status','LIKE','%'.$status.'%')
                                ->orWhere('status','LIKE','%'.$statusUpercase.'%')
                                ->paginate(10);
            $sum_orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                                ->where('status','LIKE','%'.$status.'%')
                                ->orWhere('status','LIKE','%'.$statusUpercase.'%')
                                ->get();
                                  // dd($sum_orders);

            $sum_total =0;
                    foreach ($sum_orders as $key => $order) {
                            $sum_total = $sum_total + $order->total;
                      }
            return view('auth.admin.order.list_order',compact('orders','sum_total' ));
      }
      //searchstatusInprocess
      public function searchnoteInprocess()
      {
            $status = "IN PROCESS";
            $statusUpercase = Str::lower($status);
            // dd($statusUpercase);
            $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                                ->where('status','LIKE','%'.$status.'%')
                                ->orWhere('status','LIKE','%'.$statusUpercase.'%')
                                ->paginate(10);
            $sum_orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                                ->where('status','LIKE','%'.$status.'%')
                                ->orWhere('status','LIKE','%'.$statusUpercase.'%')
                                ->get();
                                  // dd($sum_orders);

            $sum_total =0;
                    foreach ($sum_orders as $key => $order) {
                            $sum_total = $sum_total + $order->total;
                      }
            return view('auth.admin.order.list_order',compact('orders','sum_total' ));
      }

      public function detelOrder($order)
      {
        $items = OrderDetail::where('order_id', '=', $order)->get();
        $pdf = PDF::loadView('user.pdf.order-detail', ['items' => $items]);
        return $pdf->stream('order-detail.pdf');
      }

      public function cancelOrder()
      {
        $orders = Order::where('status','LIKE','2')
        ->paginate(10);
        return view('auth.admin.order.list_order', compact('orders'));
      }
      public function allOrderProcess()
      {
          $orders = Order::where('status','LIKE','1')
          ->paginate(10);
          return view('auth.admin.order.list_order', compact('orders'));
      }
      public function upDateOrder($id)
      {
        $status = Input::get ( 'note' );
        $order = Order::find($id);
        $order->update(['status' => $status]);
        $user = User::find($order->user_id);
        $items = OrderDetail::where('order_id', '=', $id)->get();
        return view('auth.admin.user.detail_order',compact('items','order','user'));

      }
}

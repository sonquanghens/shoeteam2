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
          'note' => 'in process',
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
      //searchdonebutton
      public function searchNoteDone()
      {
            $note = "DONE";
            $noteUpercase = Str::lower($note);
            // dd($noteUpercase);
            $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                                ->where('note','LIKE','%'.$note.'%')
                                ->orWhere('note','LIKE','%'.$noteUpercase.'%')
                                ->paginate(10);
            $sum_orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                                ->where('note','LIKE','%'.$note.'%')
                                ->orWhere('note','LIKE','%'.$noteUpercase.'%')
                                ->get();
                                  // dd($sum_orders);

            $sum_total =0;
                    foreach ($sum_orders as $key => $order) {
                            $sum_total = $sum_total + $order->total;
                      }
            return view('auth.admin.order.list_order',compact('orders','sum_total' ));
      }
      //searchnoteInprocess
      public function searchnoteInprocess()
      {
            $note = "IN PROCESS";
            $noteUpercase = Str::lower($note);
            // dd($noteUpercase);
            $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                                ->where('note','LIKE','%'.$note.'%')
                                ->orWhere('note','LIKE','%'.$noteUpercase.'%')
                                ->paginate(10);
            $sum_orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                                ->where('note','LIKE','%'.$note.'%')
                                ->orWhere('note','LIKE','%'.$noteUpercase.'%')
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
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\Product;
use App\OrderDetail;
use DateTime;
use Auth;
use Excel;
use PDF;

class OrderController extends Controller
{
    public function getOrder()
    {
      //dd(Cart::content());
        return view('user.shop.order');
    }

    public function SaveOrder(Request $request)
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
          'payment' => $request->Input('payment_method'),
          'note' => 'in process',

        ];

       $order = Order::create($data);

       $content = Cart::content();
       foreach ($content as $item) {
           OrderDetail::create([
             'order_id' => $order->id,
             'product_id' => $item->id,
             'name' => $name,
             'phone' => $request->Input('phone'),
             'address_recevie' => $request->Input('adress'),
             'ship_date' => $NewDate,
             'quantily' => $item->qty,
             'unit_price' => number_format($item->subtotal, 0,'',''),
             'size' => $item->options->size,
             'note' => 'NULL',
           ]);
           $product = Product::find($item->id);
           $product->update(['count' => $product->count + 1]);
       }
       Cart::destroy();
       return redirect('carts/manage');
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
        $order->update(['note' => 'not process']);
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
       })->export('pdf');
       return redirect('carts/manage');
    }

   public function export_order_detail($order)
   {
       $items = OrderDetail::where('order_id', '=', $order)->get();
       $pdf = PDF::loadView('user.pdf.order-detail', ['items' => $items]);
       return $pdf->stream('order-detail.pdf');
   }
}

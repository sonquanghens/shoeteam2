<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\OrderDetail;
use Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('auth.admin.user.list_users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   $price = $request->Input('sl2');
    //   $vitri = strpos($price, ',');
    // //  dd($price);
    //   $price_min = substr($price, 0, $vitri) * 1000000;
    //   dd($price_min);
    //   $price_max = substr($price, $vitri+1) * 1000000;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function searchUser(Request $request)
    {
      $users=User::where('name','LIKE','%'.$request->search_user."%")
                    ->orWhere('phone_number','=',$request->search_user)
                    ->orWhere('email','=',$request->search_user)->paginate(15);
      return view('auth.admin.user.search_user',compact('users'));
    }

    public function OrdersList(User $user)
    {
      $order = Order::where('user_id','=',$user->id)->paginate(15);
      return view('auth.admin.user.list_order',compact('order'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $items = OrderDetail::where('order_id', '=', $id)->get();
        return view('auth.admin.user.detail_order',compact('items','order','user'));
    }

    public function export_user()
    {
       $users = User::all();
       Excel::create('My User', function($excel) use($users) {
           $excel->sheet('Excel sheet', function($sheet) use($users) {
               $sheet->fromArray($users);
           });
       })->export('xls');
       return redirect('admin/users');
    }

}

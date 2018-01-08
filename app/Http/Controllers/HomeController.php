<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Charts;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $role = Auth::user()->role;
            if ($role==0)
             return redirect('/');
           else
             return redirect('/admin');
    }

    public function indexAdmin()
    {
      $year = date('Y');
        $add = "";
        $minus1 = date('Y', strtotime('-1 years'));
        $minus2 = date('Y', strtotime('-2 years'));
        $minus3 = date('Y', strtotime('-3 years'));
        $date = array( $add =>$add ,$year =>$year ,$minus1=>$minus1,$minus2=>$minus2,$minus3=>$minus3 );

      $chart = Charts::database(Order::all(), 'bar', 'google')
      ->elementLabel("Total")
      ->groupByMonth();
      return view('auth.admin.index',compact('chart','date'));
    }

    public function Statistical(Request $repuest)
    {
      
      $year = date('Y');
        $add = "";
        $minus1 = date('Y', strtotime('-1 years'));
        $minus2 = date('Y', strtotime('-2 years'));
        $minus3 = date('Y', strtotime('-3 years'));
        $date = array( $add =>$add ,$year =>$year ,$minus1=>$minus1,$minus2=>$minus2,$minus3=>$minus3 );
      $chart = Charts::database(Order::all(), 'bar', 'google')
      ->elementLabel("Total")
      ->groupByMonth($repuest->date);
      return view('auth.admin.index',compact('chart','date'));
    }
}

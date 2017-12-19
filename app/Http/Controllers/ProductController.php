<?php

namespace App\Http\Controllers;
use App\Product;
use App\Branch;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function home()
 {
   return view('user.page.contents');
 }


 public function getSearch(Request $req)
 {
   // $branch = Branch::where('name','like','%'.$req->key.'%')->first();
   if($req->key!=null)
   {
   $products = Product::join('branchs', 'products.id_branch', '=', 'branchs.id')
                         ->where('products.name','like','%'.$req->key.'%')
                         ->orWhere('branchs.name','like','%'.$req->key.'%')
                         ->orWhere('unit_price','=',$req->key)
                         ->paginate(25);
   }
   return view('user.page.search',compact('products'));
 }
}

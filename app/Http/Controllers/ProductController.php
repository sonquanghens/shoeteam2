<?php

namespace App\Http\Controllers;
use App\Product;
use App\Branch;
use App\Http\Requests\CreateRequest;

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

 public function allProduct()
 {
   // dd(Product::all());
   $products = Product::all();
   return view('admin.contents.product',compact('products'));
 }

 public function delete($id)
 {
   // dd(Product::find($id));
    $product = Product::find($id);
    $product->delete();
    $products = Product::all();
    return view('admin.contents.product',compact('products'));

 }

 public function create()
 {
    // dd(123);
    $branch = Branch::all()->pluck('name','id');
    // dd($branch);
   return view('admin.contents.createproduct', compact('branch'));
 }

 public function addProduct(CreateRequest $request)
 {
   $data = $request->all();
   // dd($data);
   if ($request->hasFile('image')  )
   {
       $file = $request->file('image');
       $filename = $file->getClientOriginalName();
       $images = time(). "_" . $filename;
       $destinationPath = public_path('/uploads');
       $file->move($destinationPath, $images);
       $data['image'] = $images;
       $product = Product::create($data);
   } else {
     $data['image'] = '';
     $product = Product::create($data);
   }

   $products = Product::all();
   return view('admin.contents.product',compact('products'));
 }

}

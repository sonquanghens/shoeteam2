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
         $products = Product::join('branchs', 'products.branch_id', '=', 'branchs.id')
                             ->where('products.name_product','like','%'.$req->key.'%')
                             ->orWhere('branchs.name','like','%'.$req->key.'%')
                             ->orWhere('unit_price','=',$req->key)
                             ->paginate(25);
       }
         $branch = Branch::all();

         return view('user.page.search',compact('products','branch'));
     }

     public function showProduct(Product $product)
     {
        return view('user.page.show_product_details',compact('product'));
     }

     public function PriceSearch(Request $request)
   {
       $pricesearch=Input::get();
       switch ($pricesearch['pricesearch'])
       {
           case 1:
               $products = Product::where('unit_price','<=',500000)->paginate(15);
               $branch = Branch::all();
                //dd($product);
               return view('user.page.search',compact('products','branch'));
               break;
           case 2:
               $products=Product::where('unit_price','>',400000)->where('unit_price','<=',1000000)->paginate(15);
               $branch = Branch::all();
               return view('user.page.search',compact('products','branch'));
               break;
           case 3:
               $products=Product::where('unit_price','>',1000000)->where('unit_price','<=',1400000)->paginate(15);
               $branch = Branch::all();
               return view('user.page.search',compact('products','branch'));
               break;
           case 4:
               $products=Product::where('unit_price','>',300)->where('unit_price','<=',500)->paginate(15);
               $branch = Branch::all();
               return view('user.page.search',compact('products','branch'));
               break;
           case 5:
               $products=Product::where('unit_price','>=',500)->paginate(15);
               $branch = Branch::all();
               return view('user.page.search',compact('products','branch'));
               break;
       }
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

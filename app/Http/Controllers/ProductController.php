<?php

namespace App\Http\Controllers;
use App\Product;
use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
    public function home()
     {
       $products = Product::orderBy('id','desc')->skip(0)->take(4)->get();
       $topproduct = Product::orderBy('count','desc')->skip(0)->take(4)->get();
       return view('user.page.contents', compact('products','topproduct'));
     }

     public function getSearch(Request $req)
     {
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
        // dd($product->id);
        $items = Product::join('branchs', 'products.branch_id', '=', 'branchs.id')
                            ->where('branchs.id','=',$product->branch->id)
                            ->where('products.id','<>',$product->id)
                            ->select('products.*')->inRandomOrder()->take(4)->get();
        $topproduct = Product::orderBy('count','desc')->skip(0)->take(4)->get();
        $allproduct = Product::orderBy('id','desc')->skip(0)->take(4)->get();
        return view('user.page.show_product_details',compact('product','items','topproduct','allproduct'));
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
        $products = Product::all();
        return view('auth.admin.product.list_product', compact('products'));
     }

     public function delete(Product $product)
     {
       unlink(public_path('/uploads/'.$product->image));
       $product->delete();
       return redirect('/admin/product/list_product')->withSuccess('Success !! Complete Delete Branch');
     }

     public function editProduct(Product $product)
     {
         $branch = Branch::all()->pluck('name','id');
         return view('auth.admin.product.edit_product',compact('product' ,'branch'));
     }

     public function create()
     {
          $branch = Branch::all()->pluck('name','id');
          return view('auth.admin.product.create_product',compact('branch'));
     }

     public function addProduct(EditProductRequest $request)
     {
          $data = $request->all();
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
            return redirect('/admin/product/list_product')->withSuccess('Success !! Complete Create Branch');
     }

     public function updateProduct(EditProductRequest $request,Product $product)
     {
          $data = $request->all();
          if ($request->hasFile('image'))
          {
              $file = $request->file('image');
              $filename = $file->getClientOriginalName();
              $images = time(). "_" . $filename;
              $destinationPath = public_path('/uploads');
              $file->move($destinationPath, $images);
              $data['image'] = $images;
              $product->update($data);
          } else {
              $request->image=$request->productimage;
              $product->update($data);
          }
            return redirect('/admin/product/list_product')->withSuccess('Success !! Complete Update Product');
     }

     public function search_product(Request $request)
     {
       $products = Product::join('branchs', 'products.branch_id', '=', 'branchs.id')
                           ->where('products.name_product','like','%'.$request->search_product.'%')
                           ->orWhere('branchs.name','like','%'.$request->search_product.'%')
                           ->paginate(15);
        return view('auth.admin.product.product_search',compact('products'));
     }



}

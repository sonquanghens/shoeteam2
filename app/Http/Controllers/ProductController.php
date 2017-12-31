<?php

namespace App\Http\Controllers;
use App\Product;
use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
        $products = Product::all();
        return view('auth.admin.product.list_product', compact('products'));
     }

     public function delete($id)
     {
       $product = Product::find($id);
       // dd($product);
       $product->delete();
       return redirect('/admin/product')->withSuccess('Success !! Complete Delete Branch');
     }

     public function editProduct($id)
       {
         $product = Product::find($id);
         $branch = Branch::all()->pluck('name','id');
         return view('auth.admin.product.edit_product',compact('product' ,'branch'));
       }

     public function updateProduct(CreateRequest $request,Product $product)
       {
         $data = $request->all();
         dd($data);
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
              $data['image'] = '';
             $product->update($data);
         }
         return redirect('/admin/product/list_product')->withSuccess('Success !! Complete Update Product');
       }

    public function create()
        {
          $branch = Branch::all()->pluck('name','id');
          return view('auth.admin.product.create_product',compact('branch'));
        }

    public function addProduct(CreateRequest $request)
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
              $branchs = Branch::create($data);
          } else {
            $data['image'] = '';
            $branchs = Product::create($data);
          }
            return redirect('/admin/product')->withSuccess('Success !! Complete Create Branch');
        }

        public function search(Request $request)
        {
          if($request->ajax())
          {

            $output="";

            $products=Product::where('name','LIKE','%'.$request->search_product."%")->get();
            dd($products);
            $messger = "'Are you sure to want DELETE'";
            if($products)
            {
            foreach ($products as $key => $product) {
            $output.='<tr class="gradeX odd" align="center" role="row">'.
            '<td>'.$product->id.'</td>'.
            '<td class="sorting_1">'.$product->name_product.'</td>'.
            '<td>'.$product->branch->name.'</td>'.
            '<td>'.$product->unit_price .'</td>'.
            '<td>'.$product->promotion_price.'</td>'.
            '<td> <img src="/uploads/'.$product->image.'"height="50" width="50" /> </td>'.
            '<td class="center"><a  class="btn-danger btn-sm" href="/admin/product/'.$product->id.'/delete" onclick="return xacnhan('.$messger.')"><i class="fa fa-trash-o  fa-fw"></i>Delete</a> </td>'.
            '<td class="center"> <a class="btn-info btn-sm" href="/admin/product/'.$product->id.'/edit"><i class="fa fa-pencil fa-fw"></i>Edit</a></td>'.
            '</tr>';
            }
              return Response($output);
            }
          }
        }


}

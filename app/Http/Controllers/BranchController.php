<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use Yajra\Datatables\Facades\Datatables;
use App\Branch;
use App\Product;

class BranchController extends Controller
{
    public function CreateBranch()
    {
       return view('admin.contents.content');
    }

    public function saveBranch(CreateRequest $request)
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
           $product = Branch::create($data);
       } else {
         $data['image'] = '';
         $product = Branch::create($data);
       }
         return view('admin.contents.content');
    }

    public function getBranch($name)
    {
      $branch_name = $name;
      $branch = Branch::all();
      $products = Product::join('branchs', 'products.branch_id', '=', 'branchs.id')
        ->where('branchs.name','=',$name)->select('products.*')->paginate(25);

      return view('user.page.show_branch', compact('branch', 'products','branch_name'));
    }

    public function Branch(){
      return view('admin.contents.branch');
    }

}

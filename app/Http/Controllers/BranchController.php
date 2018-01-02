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
       return view('auth.admin.branch.create_branch');
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
           $branchs = Branch::create($data);
       } else {
         $data['image'] = '';
         $branchs = Branch::create($data);
       }
         return redirect('/admin/branch/list_branch')->withSuccess('Success !! Complete Create Branch');
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
      $branchs = Branch::paginate(25);
      return view('auth.admin.branch.branch_list',compact('branchs'));
    }

    public function editBranch(Branch $branch)
    {
      return view('auth.admin.branch.edit_branch',compact('branch'));
    }

    public function updateBranch(CreateRequest $request,Branch $branch)
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
          $branch->update($data);
      } else {
          $request->image=$request->branchimage;
          $branch->update($data);
      }
      return redirect('/admin/branch/list_branch')->withSuccess('Success !! Complete Update Branch');
    }

    public function deleteBranch(Branch $branch)
    {
      $branch->delete();
      return redirect('/admin/branch/list_branch')->withSuccess('Success !! Complete Delete Branch');
    }

    public function search_branch(Request $request)
    {
        $branchs = Branch::where('name','LIKE','%'.$request->value.'%')->paginate(10);
        return view('auth.admin.branch.branch_search',compact('branchs'));
    }
}

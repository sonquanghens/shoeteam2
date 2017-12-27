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
      $branchs = Branch::paginate(15);
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

    public function search(Request $request)
    {
      if($request->ajax())
      {

        $output="";

        $branchs=Branch::where('name','LIKE','%'.$request->search."%")->get();
        $messger = "'Are you sure to want DELETE'";
        if($branchs)
        {
        foreach ($branchs as $key => $branch) {
        $output.='<tr class="gradeX odd" align="center" role="row">'.
        '<td>'.$branch->id.'</td>'.
        '<td class="sorting_1">'.$branch->name.'</td>'.
        '<td>'.$branch->description.'</td>'.
        '<td> <img src="/uploads/'.$branch->image.'"height="50" width="50" /> </td>'.
        '<td class="center"><a  class="btn-danger btn-sm" href="/admin/branch/'.$branch->id.'/delete" onclick="return xacnhan('.$messger.')"><i class="fa fa-trash-o  fa-fw"></i>Delete</a> </td>'.
        '<td class="center"> <a class="btn-info btn-sm" href="/admin/branch/'.$branch->id.'/edit"><i class="fa fa-pencil fa-fw"></i>Edit</a></td>'.
        '</tr>';
        }
          return Response($output);
        }
      }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;

class BranchController extends Controller
{
  public function getBranch()
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
}

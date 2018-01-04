<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function listSlide()
    {
        $slides = Slide::orderBy('id','ASC')->paginate(5);
        return view('auth.admin.Slide.list_slide', compact('slides'));
    }

    public function createSlide()
    {
         return view('auth.admin.Slide.create_slide');
    }

    public function saveSlide(Request $request)
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
          $branchs = Slide::create($data);
      } else {
        $data['image'] = '';
        $branchs = Slide::create($data);
      }
        return redirect('/admin/slide/list_slide')->withSuccess('Success !! Complete Create Slide');
    }

    public function deleteSlide(Slide $slide)
    {
      unlink(public_path('/uploads/'.$slide->image));
      $slide->delete();
      return redirect('/admin/slide/list_slide')->withSuccess('Success !! Complete Delete Slide');
    }

    public function editSlide(Slide $slide)
    {
      return view('auth.admin.Slide.edit_slied',compact('slide'));
    }

    public function updateSlide(Slide $slide)
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
          $slide->update($data);
      } else {
          $request->image=$request->branchimage;
          $slide->update($data);
      }
      return redirect('/admin/slide/list_slide')->withSuccess('Success !! Complete Update Slide');
    }
}

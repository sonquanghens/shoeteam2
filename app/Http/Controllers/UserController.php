<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('auth.admin.user.list_users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   $price = $request->Input('sl2');
    //   $vitri = strpos($price, ',');
    // //  dd($price);
    //   $price_min = substr($price, 0, $vitri) * 1000000;
    //   dd($price_min);
    //   $price_max = substr($price, $vitri+1) * 1000000;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchUser(Request $request)
    {
      if($request->ajax())
      {

        $output="";
        $role = "";
        $users=User::where('name','LIKE','%'.$request->search_user."%")
                      ->orWhere('phone_number','=',$request->search_user)
                      ->orWhere('email','=',$request->search_user)->get();

        $messger = "'Are you sure to want DELETE'";
        if($users)
        {
        foreach ($users as $key => $user) {
          if($user->role == 1)
          {
            $role = "Admin";
          }
          else {
            $role = "User";
          }
        $output.='<tr class="gradeX odd" align="center" role="row">'.
        '<td>'.$user->id.'</td>'.
        '<td class="sorting_1">'.$user->name.'</td>'.
        '<td>'.$user->gender.'</td>'.
        '<td>'.$role.'</td>'.
        '<td>'.$user->phone_number.'</td>'.
        '<td>'.$user->email.'</td>'.
        '<td class="center"><a  class="btn-danger btn-sm" href="/admin/users/'.$user->id.'/delete" onclick="return xacnhan('.$messger.')"><i class="fa fa-trash-o  fa-fw"></i>Delete</a> </td>'.
        '<td class="center"> <a class="btn-info btn-sm" href="/admin/users/'.$user->id.'/edit"><i class="fa fa-pencil fa-fw"></i>Edit</a></td>'.
        '</tr>';
        }
          return Response($output);
        }
      }
    }
}

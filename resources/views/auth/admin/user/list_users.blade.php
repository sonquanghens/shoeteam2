@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12" style=" margin-bottom: 25px;  border-bottom: 2px solid #d2d2d2;">
            <div class="col-sm-4">
              <h1 class="page-head">User <small>list</small></h1>
            </div>
            <div class="col-sm-3" style="margin-top:30px;width: 28%;">
              <p style="float:right;"><a class="btn-primary btn-lg" role="button" href="#">CREATE</a></p>
            </div>
              <div class="input-group" style="float: right;    margin-top: 19px;">
                <form class="navbar-form navbar-left" method="get" id="searchform" action="{{url('admin/users/search')}}">
                  <div class="form-group">
                    <input type="text" value="{{ isset($_GET['search_user']) ? $_GET['search_user'] : '' }}" name="search_user" class="form-control" placeholder="Search">
                    <button type="submit"  class="btn btn-info">sreach</button>
                    <a href="{{url('/admin/users')}}"  class="btn btn-info">Cancel</a>
                  </div>
                </form>
            </div>
      </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                          <thead>
                              <tr align="center" role="row">
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 66px;">ID
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 142px;" aria-sort="ascending">Name
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 132px;">Gender
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Role
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Phone
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Email
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">List Order
                                </th>
                              </tr>
                          </thead>
                          <tbody>
                          @if(isset($users))
                          @foreach($users as $user)
                          <tr class="gradeX odd" align="center" role="row">

                                  <td class="">{{ $user->id }}</td>
                                  <td class="sorting_1">{{ $user->name }}</td>
                                  <td>{{ $user->gender }}</td>
                                  <td>@if($user->role == 1)Admin @else User @endif</td>
                                  <td>{{ $user->phone_number }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td class="center"> <a class="btn-info btn-sm" href="{{url('/admin/users/order/').'/'.$user->id}}"><i class="fa fa-eye  fa-fw"></i>Detail</a></td>
                              </tr>
                            @endforeach
                          @endif
                            </tbody>
                      </table>
                    </div>
                    <div class="col-sm-10"><a href="{{ url('/admin/users/export')}}" class="btn btn-success" style="float: right;"> Export Excel</a></div>
                    <div class="col-sm-2">{{ $users->links() }}</div>
                  </div>
                </div>
              </div>
          </div>

  <!-- /. PAGE INNER  -->
@stop

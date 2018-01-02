@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12" style=" margin-bottom: 25px;  border-bottom: 2px solid #d2d2d2;">
            <div class="col-sm-5">
              <h1 class="page-head">Branch <small>list</small></h1>
            </div>
            <div class="col-sm-3" style="margin-top:30px;width: 30%;">
              <p style="float:right;"><a class="btn-primary btn-lg" role="button" href="{{ url('/admin/branch/create') }}">CREATE</a></p>
            </div>
              <div class="input-group" style="float: right;margin-top: 19px;">
                <form class="navbar-form navbar-left" method="get" id="searchform" action="{{url('admin/branch/search')}}">
                  <div class="form-group">
                    <input type="text" value="{{ isset($_GET['value']) ? $_GET['value'] : '' }}" name="value" class="form-control" placeholder="Search" id="search">
                    <button type="submit"  class="btn btn-info">sreach</button>
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
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 66px;">ID
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 142px;" aria-sort="ascending">Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 132px;">Description
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Image
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 113px;">Delete</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 87px;">Edit</th>
                              </tr>
                          </thead>
                          <tbody>
                          @if(isset($branchs))
                          @foreach($branchs as $branch)
                          <tr class="gradeX odd" align="center" role="row">

                                  <td class="">{{ $branch->id }}</td>
                                  <td class="sorting_1">{{ $branch->name }}</td>
                                  <td>{{ $branch->description }}</td>
                                  <td> <img src="/uploads/{{ $branch->image }}" height="50" width="50" alt=""></td>
                                  <td class="center"><a  class="btn-danger btn-sm" href="{{url('/admin/branch'.'/'.$branch->id.'/delete')}}" onclick="return xacnhan('Are you sure to want DELETE')"><i class="fa fa-trash-o  fa-fw"></i>Delete</a></td>
                                  <td class="center"> <a class="btn-info btn-sm" href="{{url('/admin/branch'.'/'.$branch->id.'/edit')}}"><i class="fa fa-pencil fa-fw"></i>Edit</a></td>
                              </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">{{ $branchs->links() }}</div>
                  </div>
                </div>
              </div>
          </div>
  <!-- /. PAGE INNER  -->
@stop

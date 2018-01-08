@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12" style=" margin-bottom: 25px;  border-bottom: 2px solid #d2d2d2;">
            <div class="col-sm-6">
              <h1 class="page-head">Slide <small>list</small></h1>
            </div>
            <div class="col-sm-6" style="margin-top:30px;">
              <p style="float:right;"><a class="btn-primary btn-lg" role="button" href="{{ url('/admin/slide/create') }}">CREATE</a></p>
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
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Image
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Link
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 113px;">Delete</th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 87px;">Edit</th>
                              </tr>
                          </thead>
                          <tbody>
                          @if(isset($slides))
                          @foreach($slides as $value)
                          <tr class="gradeX odd" align="center" role="row">
                                  <td class="">{{ $value->id }}</td>
                                  <td> <img src="/uploads/{{ $value->image }}" height="50" width="50" alt=""></td>
                                  <td class="">{{ $value->link }}</td>
                                  <td class="center"><a  class="btn-danger btn-sm" href="{{url('/admin/slide'.'/'.$value->id.'/delete')}}" onclick="return xacnhan('Are you sure to want DELETE')"><i class="fa fa-trash-o  fa-fw"></i>Delete</a></td>
                                  <td class="center"> <a class="btn-info btn-sm" href="{{url('/admin/slide'.'/'.$value->id.'/edit')}}"><i class="fa fa-pencil fa-fw"></i>Edit</a></td>
                              </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">{{ $slides->links() }}</div>
                  </div>
                </div>
              </div>
          </div>
  <!-- /. PAGE INNER  -->
@stop

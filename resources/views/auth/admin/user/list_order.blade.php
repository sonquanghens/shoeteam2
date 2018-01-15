@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12" style=" margin-bottom: 25px;  border-bottom: 2px solid #d2d2d2;">
            <div class="col-sm-6">
              <h1 class="page-head">Orders <small>list</small></h1>
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
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Date
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 141px;">Status
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 141px;">Address
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Ship: activate to sort column ascending" style="width: 141px;">Ship Date
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 141px;">Phone
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 141px;">Name Receiver
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Orderer: activate to sort column ascending" style="width: 141px;">Orderer
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Details: activate to sort column ascending" style="width: 87px;">Details</th>
                              </tr>
                          </thead>
                          <tbody>
                          @if(isset($order))
                          @foreach($order as $value)
                          <tr class="gradeX odd" align="center" role="row">
                                  <td class="">{{ $value->id }}</td>
                                  <td class="">{{ $value->date_order->format('d-m-Y') }}</td>
                                  <td class="">
                                    @if($value->status == 3 )
                                      Đã Hủy
                                    @elseif($value->status == 2)
                                      Đã Xử Lý
                                    @else
                                      Chưa Xử Lý
                                    @endif
                                  </td>
                                  <td class="">{{ $value->address_recevie  }}</td>
                                  <td class="">{{ $value->ship_date  }}</td>
                                  <td class="">{{ $value->phone  }}</td>
                                  <td class="">{{ $value->name_receiver  }}</td>
                                  <td class="">{{ App\User::find($value->user_id)->name}}</td>
                                  <td class="center"> <a class="btn-info btn-sm" href="{{url('/admin/users/order'.'/'.$value->id.'/detail')}}"><i class="fa fa-pencil fa-fw"></i>Details</a></td>
                              </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">{{ $order->links() }}</div>
                  </div>
                </div>
              </div>
          </div>
  <!-- /. PAGE INNER  -->
@stop

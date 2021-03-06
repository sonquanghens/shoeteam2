@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12" style=" margin-bottom: 25px;  border-bottom: 2px solid #d2d2d2;">
            <div class="col-sm-6">
              <h1 class="page-head">order <small>list</small></h1>
            </div>
            <!-- <div class="col-sm-6" style="margin-top:30px;width: -5%;">
              <p style="float:right;"><a class="btn-primary btn-lg" role="button" href="{{ url('/admin/product/create') }}">CREATE</a></p>
            </div> -->
            <div class="input-group" style="float: right;    margin-top: 19px;">
              <!-- //form seach -->
              <form class="navbar-form navbar-left" action="/admin/search_order" role="search" method="GET" >


                {!!Form::label('Status', null, ['class' => 'form-control'])!!}
                 {!! Form::select('note',
                     [
                        ''  =>  '',
                        '1'        => 'Chưa xử lý',
                        '2'      => 'Đã xử lý',
                        '3'        => 'Hủy',
                    ]
                    , null, [ 'class' =>  'form-control',])
                 !!}
                {!!Form::label('From', null, ['class' => 'form-control'])!!}
                {!! Form::date('date_start', null, ['class' => 'form-control']) !!}
                {!!Form::label('to', null, ['class' => 'form-control'])!!}
                {!! Form::date('date_end', null, ['class' => 'form-control']) !!}
                <!-- {!!Form::label('Details', null, ['class' => 'form-control'])!!} -->
                <div class="form-group">
                  <input type="text" class="form-control" name="search_order"  value="{{ isset($_GET['search_order']) ? $_GET['search_order'] : '' }}">
                  &nbsp;&nbsp;&nbsp;
                  <button type="submit"  class="btn-info btn-sm">sreach</button>
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
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 142px;" aria-sort="ascending">User name
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 142px;" aria-sort="ascending">Date order
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 132px;">Total
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Status
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">detail
                                </th>
                                <!-- <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 113px;">Delete</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 87px;">Edit</th> -->
                              </tr>
                          </thead>
                          <tbody>
                          @if(isset($orders))
                          @foreach($orders as $order)
                          <tr class="gradeX odd" align="center" role="row">

                                  <td class="">{{ $order->id }}</td>

                                  <td class="sorting_1">
                                    {{ $order->user->name }}      
                                 </td>
                                  <td>{{ $order->date_order->format('d/m/Y') }}</td>
                                  <td>{{number_format ($order->total, 0,'','.') }}</td>
                                  @if($order->status == 1 )
                                  <td> Chưa xử lý	</td>
                                  @endif
                                  @if($order->status == 2 )
                                  <td> Đã xử lý	</td>
                                  @endif
                                  @if($order->status == 3 )
                                  <td> Hủy	</td>
                                  @endif
                                  <td class="center"> <a class="btn-info btn-sm" href="{{url('/admin/users/order'.'/'.$order->id.'/detail')}}"><i class="fa fa-pencil fa-fw"></i>order_tail</button></td>
                              </tr>
                            @endforeach
                          @endif
                            </tbody>
                      </table>
                    </div>
                    <h1>
                      @if(isset($sum_total))
                        <h3>&nbsp;&nbsp;&nbsp;Tổng tiền : {{number_format ($sum_total, 0,'','.')}} đ</h3>
                      @endif
                    </h1>
                  @if(isset($orders))
                  {{ $orders->links() }}
                  @endif
                  </div>
                </div>
              </div>
          </div>

  <!-- /. PAGE INNER  -->

@stop

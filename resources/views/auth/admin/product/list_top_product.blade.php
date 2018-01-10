@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12" style=" margin-bottom: 25px;  border-bottom: 2px solid #d2d2d2;">
            {!! $chart->html() !!}
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
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 142px;" aria-sort="ascending">Name Product
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 142px;" aria-sort="ascending">Name Branch
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 132px;">unit price
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 132px;">Promotion Price
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 141px;">Image
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Sale: activate to sort column ascending" style="width: 141px;">Sale
                                </th>
                                <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 141px;">Status
                                </th>
                              </tr>
                          </thead>
                          <tbody>
                          @if(isset($products))
                          @foreach($products as $product)
                          <tr class="gradeX odd" align="center" role="row">

                                  <td class="">{{ $product->id }}</td>
                                  <td class="sorting_1">{{ $product->name_product }}</td>
                                  <td>{{ $product->branch->name }}</td>
                                  <td>{{ number_format($product->unit_price, 0,',','.') }}</td>
                                  <td>{{ number_format($product->promotion_price, 0,',','.') }}</td>
                                  <td> <img src="/uploads/{{ $product->image }}" height="50" width="50" alt=""></td>
                                  <td>{{ $product->count }}</td>

                                  <td>@if($product->status == '0') Còn hàng @else Hết hàng @endif</td>
                              </tr>
                            @endforeach
                          @endif
                            </tbody>
                      </table>
                    </div>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">{{ $products->links() }}</div>
                  </div>
                </div>
              </div>
  </div>

  <!-- /. PAGE INNER  -->
  {!! Charts::scripts() !!}
  {!! $chart->script() !!}
@stop

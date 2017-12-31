@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12" style=" margin-bottom: 25px;  border-bottom: 2px solid #d2d2d2;">
            <div class="col-sm-6">
              <h1 class="page-head">Product <small>list</small></h1>
            </div>
            <div class="col-sm-6" style="margin-top:30px;width: 28%;">
              <p style="float:right;"><a class="btn-primary btn-lg" role="button" href="{{ url('/admin/product/create') }}">CREATE</a></p>
            </div>
            <div class="input-group" style="float: right;    margin-top: 19px;">
              <form class="navbar-form navbar-left" role="">
                <div class="form-group">
                  <input type="text" class="form-control" name="search_product" placeholder="Search" id="search_product">
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
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 142px;" aria-sort="ascending">Name Product
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 142px;" aria-sort="ascending">Name Branch
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 132px;">unit price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 132px;">Promotion Price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Image
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Unit
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 113px;">Delete</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 87px;">Edit</th>
                              </tr>
                          </thead>
                          <tbody>
                          @if(isset($products))
                          @foreach($products as $product)
                          <tr class="gradeX odd" align="center" role="row">
                                  <td class="">{{ $product->id }}</td>
                                  <td class="sorting_1">{{ $product->name_product }}</td>
                                  <td>{{ $product->branch->name }}</td>
                                  <td>{{number_format ($product->unit_price, 0,'','.') }}</td>
                                  <td>{{ $product->promotion_price }}</td>
                                  <td> <img src="/uploads/{{ $product->image }}" height="50" width="50" alt=""></td>
                                  <td>{{ $product->unit }}</td>


                                  <td class="center"><a  class="btn-danger btn-sm" href="{{url('/admin/product'.'/'.$product->id.'/delete')}}" onclick="return xacnhan('Are you sure to want DELETE')"><i class="fa fa-trash-o  fa-fw"></i>Delete</button></td>
                                  <td class="center"> <a class="btn-info btn-sm" href="{{url('/admin/product'.'/'.$product->id.'/edit')}}"><i class="fa fa-pencil fa-fw"></i>Edit</button></td>
                              </tr>
                            @endforeach
                          @endif
                            </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>

  <!-- /. PAGE INNER  -->

@stop

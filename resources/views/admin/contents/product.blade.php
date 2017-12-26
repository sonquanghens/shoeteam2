@extends('admin.layouts.admin_master')
@section('content')
<strong><h1>Sản phẩm</h1> </strong>
<table class="table table-hover">
    <thead>

      <tr>
        <th>Tên</th>
        <th>Hãng</th>
        <th>Hình</th>
        <th>Giá</th>
        <th>Giảm giá</th>
        <th>Miêu Tả</th>
        <th><a href="product/create"><button type="button" class="btn btn-primary btn-lg">Add</button></a> </th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->branch->name}}</td>
        <td>{{$product->image}}</td>
        <td>{{$product->unit_price}}</td>
        <td>{{$product->promotion_price}}</td>
        <td>{{$product->description}}</td>
        <td>  <a href="product/edit/{{$product->id}}"><button type="button" class="btn btn-success">edit</button></a></td>
        <td><a href="product/delete/{{$product->id}}"><button type="button" class="btn btn-danger">delete</button></a></td>


      </tr>
      @endforeach
    </tbody>
</table>
@stop

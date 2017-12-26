@extends('auth.admin.layouts.admin_master')
@section('content')
<form action="{{ url('admin/search/price')}}" method="get">
									 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="50" data-slider-step="0.5" data-slider-value="[1,25]" id="sl2" name="sl2" ><br />
									 <b class="pull-left">0 tr</b> <b class="pull-right">50 tr</b><br>
									 <button type="submit" class="btn btn-success">Tìm Kiếm</button>
								 </form>
@stop

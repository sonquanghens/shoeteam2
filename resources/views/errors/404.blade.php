@extends('user.layouts.master')
@section('content')
<div class="row">
  <div class="container">
    <div id="page_404">
      <div class="text_404">
        <span>Nội dung bạn tìm kiếm không tồn tại</span>
        <a class="text" href="javascript:void(0);" onclick="window.history.go(-1); return false;">Quay lại</a>
        <a href="javascript:void(0);" onclick="window.history.go(-1); return false;"><img src="/img/back.png"></a>
      </div>
    </div>
  </div>
</div>
@stop

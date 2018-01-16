<div class="form-group">
{!! Form::label('name_product', 'Name') !!}
<div class="form-controls">
  {!! Form::text('name_product',null, ['class' => 'form-control']) !!}
</div>
  @if ( $errors->has('name_product') )
    <span class="text-danger">
        <strong> {{ $errors->first('name_product') }}</strong>
    </span>
  @endif
</div>
<div>
  <input type="hidden" name="productimage" value="@if(!empty($product))
  {{$product->image}}
  @endif">
</div>
<div class="form-group">
{!! Form::label('description', 'Description') !!}
<div class="form-controls">
  {!! Form::textarea('description',null, ['class' => 'form-control']) !!}
</div>
  @if ( $errors->has('description') )
    <span class="text-danger">
        <strong> {{ $errors->first('description') }}</strong>
    </span>
  @endif
</div>
<script type="text/javascript">
     CKEDITOR.replace( 'description' );  
  </script>
<div class="form-group">
{!! Form::label('unit_price', 'Giá bán') !!}
<div class="form-controls">
  {!! Form::text('unit_price',null, ['class' => 'form-control']) !!}
</div>
  @if ( $errors->has('unit_price') )
    <span class="text-danger">
        <strong> {{ $errors->first('unit_price') }}</strong>
    </span>
  @endif
</div>

<div class="form-group">
{!! Form::label('promotion_price', 'Giá khuyễn mãi') !!}
<div class="form-controls">
  {!! Form::text('promotion_price',null, ['class' => 'form-control']) !!}
</div>
  @if ( $errors->has('promotion_price') )
    <span class="text-danger">
        <strong> {{ $errors->first('promotion_price') }}</strong>
    </span>
  @endif
</div>

<div class="form-group">
{!! Form::label('branch', 'Branch') !!}
<div class="form-controls">
  {!! Form::select('branch_id',$branch,null, ['class' => 'form-control']) !!}
</div>
  @if ( $errors->has('branch'))
    <span class="text-danger">
        <strong> {{ $errors->first('branch') }}</strong>
    </span>
  @endif
  </div>

  <div class="form-group">
  {!! Form::label('status', 'Trạng thái') !!}
  <div class="form-controls">
    {!! Form::radio('status', '0', true) !!}<span>Còn hàng</span>
    {!! Form::radio('status', '1') !!}<span>Hết hàng</span>

  </div>
  </div>

  @if(isset($branch))
  <div>
    <img id="output" src="/uploads/@if(isset($product)){{$product->image}} @endif " width="350" height="300" alt="image"/>
  </div>
  @endif

  <div class="form-group">
  {!! Form::label('image', 'Image') !!}
  <div class="form-controls">
    {!! Form::file('image',null, ['class' => 'form-control']) !!}
  </div>
  @if ( $errors->has('image') )
    <span class="text-danger">
        <strong> {{ $errors->first('image') }}</strong>
    </span>
  @endif

{!! Form::submit('Save Product', ['class' => 'btn btn-primary']) !!}

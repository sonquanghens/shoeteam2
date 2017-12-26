@extends('admin.layouts.admin_master')
@section('content')
<div class="">

</div>
{!!Form::open(['url'=>'admin/product/add', 'files' => true])!!}

  {!!Form::label('name','name') !!}

  {!!Form::text('name',null,['class'=>'form-controls'])!!}

    {!!Form::label('unit_price','unit_price') !!}

  {!!Form::number('unit_price',null,['class'=>'form-controls'])!!}

    {!!Form::label('promotion_price','promotion_price') !!}

    {!!Form::text('promotion_price',null,['class'=>'form-control'])!!}

    {!!Form::label('branch_id','branch_id') !!}

    {!!Form::select('branch_id',$branch,null,['class'=>'form-control'])!!}

  {!!Form::label('description','description') !!}

  {!!Form::text('description',null,['class'=>'form-controls'])!!}

  {!!Form::label('unit','unit') !!}

  {!!Form::text('unit',null,['class'=>'form-controls'])!!}

  {!! Form::label('image', 'Image') !!}

    {!! Form::file('image', null, ['class' => 'form-control']) !!}

  @if ( $errors->has('quantity') )
    <span class="text-danger">
        <strong> {{ $errors->first('quantity') }}</strong>
    </span>
  @endif
  </div>

    {!!Form::submit('Save Product ',['class'=>'btn btn-primary'])!!}
</div>
{!!Form::close()!!}
@stop

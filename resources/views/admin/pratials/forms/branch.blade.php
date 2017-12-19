<div class="form-group">
{!! Form::label('name', 'Name') !!}
<div class="form-controls">
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
  @if ( $errors->has('name') )
    <span class="text-danger">
        <strong> {{ $errors->first('name') }}</strong>
    </span>
  @endif
</div>

<div class="form-group">
{!! Form::label('description', 'Description') !!}
<div class="form-controls">
  {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
@if ( $errors->has('description') )
  <span class="text-danger">
      <strong> {{ $errors->first('description') }}</strong>
  </span>
@endif
</div>

<div class="form-group">
{!! Form::label('image', 'Image') !!}
<div class="form-controls">
  {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>
@if ( $errors->has('quantity') )
  <span class="text-danger">
      <strong> {{ $errors->first('quantity') }}</strong>
  </span>
@endif
</div>


{!! Form::submit('Save Product', ['class' => 'btn btn-primary']) !!}


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

<div>
  <input type="hidden" name="branchimage" value="@if(!empty($branch))
  {{$branch->image}}
  @endif">
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
@if(isset($branch))
<div>
  <img id="output" src="/uploads/@if(isset($branch)){{$branch->image}} @endif " width="350" height="300" alt="image"/>
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



</div>


{!! Form::submit('Save Branch', ['class' => 'btn btn-primary']) !!}

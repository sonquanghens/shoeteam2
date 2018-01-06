

<div class="form-group">
{!! Form::label('link', 'Link') !!}
<div class="form-controls">
  {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>
@if ( $errors->has('link') )
  <span class="text-danger">
      <strong> {{ $errors->first('link') }}</strong>
  </span>
@endif
</div>
<div>
  <input type="hidden" name="branchimage" value="@if(!empty($slide))
  {{$slide->image}}
  @endif">
</div>
@if(isset($slide))
<div>
  <img id="output" src="/uploads/@if(isset($slide)){{$slide->image}} @endif " width="350" height="300" alt="image"/>
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


{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

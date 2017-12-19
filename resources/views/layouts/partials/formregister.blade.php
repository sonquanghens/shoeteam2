<div class="form-group">
  {!!Form::label('name','Name') !!}
    <div class="form-controls">
  {!!Form::text('name',null,['class'=>'form-controls'])!!}
    </div>
</div>
<div class="form-group">
  {!!Form::label('date_of_birth','Date of birth') !!}
    <div class="form-controls">
  {!!Form::date('date_of_birth',null,['class'=>'form-controls'])!!}
    </div>
</div>
<div class="form-group">
  {!!Form::label('breed_id','Breed id') !!}
    <div class="form-controls">
  {!!Form::select('breed_id',$breed,null,['class'=>'form-controls'])!!}
    </div>
</div>
{!!Form::submit('Save cat ',['class'=>'btn btn-primary'])!!}

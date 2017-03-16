@extends('layouts.app')

@section('content')
	<div class="container">
		{{ Html::ul($errors->all()) }}

		{{ Form::open(array('url'=>'tasks')) }}
		<div class="form-group">
  		{{ Form::label('task-name','Task Name') }}
  		{{Form::text('task_name',Input::old('task_name'),array('class'=>'form-control'))}}
		</div>
    <div class="form-group">
      {{ Form::label('task-status','Task Status') }}
      {{Form::select('task_status',array('0'=>'Select Status','complete'=>'Complete','incomplete'=>'Incomplete','in progress'=>'In Progress','pending'=>'Pending'),Input::old('task_status'),array('class'=>'form-control'))}}
    </div>
    {{ Form::submit('Create Task',array('class'=>'btn btn-primary')) }}
    {{ Form::close() }}
	</div>
@endsection
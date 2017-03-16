@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h1>{{ $task->task_name }}</h1>
		<strong>Status:</strong> {{ $task->task_status }}
	</div>

@endsection
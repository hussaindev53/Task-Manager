@extends('layouts.app')

@section('content')
	<div class="container">
    Tasks List
    @if(Session::has('message'))
      <div class="alert alert-info messages">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <td>S.No.</td>
          <td>Tasks</td>
          <td>Status</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
        @foreach($tasks as $task)
          <tr>

          <td>{{ $i }}</td>
          
          <td onkeydown="update_task('{{ $task->id }}')" id="edit-me" >{{$task->task_name}}</td>
          
          <td id="task-status">{{$task->task_status}}</td>
          
          <td>
          
          <a class="btn btn-info" href="{{ URL::to('tasks/'.$task->id) }}">Show this Task</a>
          
          <a class="btn btn-warning edit-task" href="javascript:void(0)" onclick="editTask()">Edit this Task</a>

          </td>
          
          </tr>

          <?php $i++; ?>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
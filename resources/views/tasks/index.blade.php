@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Human Resource') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<br/>
<div class="container">
<div class="sub-cont">
<div class="card"><h1 class="d-flex justify-content-center ion ion-grid">&nbsp;<strong> Tasks</strong></h1>
<div class="row t-title d-flex justify-content-center">
<a href=""><button class="btn btn-primary">New</button></a>&nbsp;&nbsp;
<a href=""><button class="btn btn-warning">Pending</button></a>&nbsp;&nbsp;
<a href=""><button class="btn btn-success">Finished</button></a>&nbsp;
</div>
</div>
<br>
<div class="card">
<div class="container">
<div class="row c-head">
    <div class="col-md-6">
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Add Task
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
       @csrf
      <div class="modal-body">
        <input type="text" class="form-control" name="task_name" placeholder="Task Name" required><br>
        <select name="priority" id="" class="form-control" required>
            <option value="">Priority</option>
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
        </select>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary d-flex justify-content-left" data-dismiss="modal" >Close</button> -->
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>
    </div>
  </div>
</div>
    </div>
    <div class="col-md-6">
        <h1 class="ion ion-drag float-right"></h1> 
    </div>
</div>
<hr>
{!! Form::open(['action' => 'TasksController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
@csrf
<div class="row">
    <div class="col-md-8">
        <h2>New Tasks</h2>
    </div>
    <div class="col-md-2">
        <!-- <h3>Date updated</h3> -->
    </div>
   
    <div class="col-md-2">
        <h3></h3>
        <select name="priority" id="priority_select" class="form-control">
            <option>Priority</option>
            @foreach($priorities as $pr => $value)
            <option id="tValue" value="{{$pr}}" data-pr="{{$value}}">{{$value ? : ''}}</option>
            @endforeach
        </select>
    </div>
</div>
<hr>
<div class="task_container">
    <div class="row" id="task_body">
        @if(count($tasks))    
        @foreach($tasks as $task)  
        <div class="col-md-8">
           <a href=""> <h4><span class="ion ion-toggle"> {{ $task->task_name}} </span> </h4></a>
        </div>
        <div class="col-md-2">
        <h4 class="dte"><small>{{ date('F j', strtotime($task->created_at)) }}</small></h4>
        </div>
        <div class="col-md-2 float-right">
        @if($task->priority == 'Low' )
        <h4><span class="badge badge-pill badge-primary">{{$task->priority}}</span></h4> 
        @elseif($task->priority == 'Medium')      
        <h4><span class="badge badge-pill badge-warning">{{$task->priority}}</span></h4>
        @else
        <h4><span class="badge badge-pill badge-danger">{{$task->priority}}</span></h4>
        @endif
        </div>
        @endforeach
    </div>  
    <!-- <input id="tas" type="text" value="priority"> -->
    {{$tasks->links()}}  
    @else
        <p>No new Tasks</p>
    @endif
    
    <!-- <input type="text" name="name" id="name" class="form-control" autocomplete="off" readonly>  -->
    
</div>
</div>
</div>

</div>
</div>

<script src="{{ asset('js/tasks.js') }}"></script>
</body>
@endsection
</html>
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
<br>
<div class="row t-title d-flex justify-content-center">
<a href=""><button class="btn btn-info">New</button></a>&nbsp;&nbsp;
<a href=""><button class="btn btn-warning">Pending</button></a>&nbsp;&nbsp;
<a href=""><button class="btn btn-success">Finished</button></a>&nbsp;
</div>
</div>
<br>
<div class="card">
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
        <input type="text" class="form-control" name="task_name" placeholder="Task Name"><br>
        <select name="priority" id="" class="form-control">
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
</div>

</div>
</div>
</body>
@endsection
</html>
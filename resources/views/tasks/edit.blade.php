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
{!! Form::open(['action' => ['TasksController@update', $task->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

<div class="task_container">
    <br>
   {{$task->task_name}}   
</div>
</div>
</div>

</div>
</div>

<script src="{{ asset('js/tasks.js') }}"></script>
</body>
@endsection
</html>
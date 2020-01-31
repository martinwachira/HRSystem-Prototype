{{--@extends('layouts.app')--}}

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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<br/>

<div class="card-body offset-md-3">
    {{--@section('content')--}}
    <h1  style="margin-left: 10px">Edit Role</h1>
    {!! Form::open(['action' => ['RolesController@update', $role['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group col-md-6">
        {{Form::label('name', 'Role Name: ',['class'=>' col-form-label text-md-right'])}}
        {{Form::text('role_name', $role['role_name'], ['class' => 'form-control'])}}
    </div>

    {{Form::hidden('_method','PUT')}}
    &nbsp;&nbsp;&nbsp;&nbsp;
    {{Form::submit('Edit', ['class'=>'btn btn-primary '])}}
    {!! Form::close() !!}
    <a href="/roles" class="btn btn-default">Go Back</a>
</div>
{{--@endsection--}}

</body>
</html>




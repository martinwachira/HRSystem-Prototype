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

@extends('layouts.app')
@section('content')
    <br/><br/><br/>
    <div class="col-md-12 text-md-left">

        <a href="/roles" class="btn btn-default">Go Back</a>
        <h1 class="col-md-4">{{$role->role_name}}</h1>

        <small class="col-md-4 col-form-label text-md-right">Created on {{$role->created_at}}</small>
        <hr>
        {{--    @if(!Auth::guest())--}}
        {{--        @if(Auth::user()->id == $roles->user_id)--}}
        <a href="/roles/{{$role->id}}/edit" class="btn btn-default">Edit</a>

        {!!Form::open(['action' => ['RolesController@destroy', $role->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}

    </div>

@endsection
</body>
</html>

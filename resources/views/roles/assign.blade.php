@extends('layouts.app')
@section('content')
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

<div class="container">
<h2>Assign roles</h2>

{!! Form::open(['action' => 'RolesController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
    @csrf

@if(count($roles) > 0)
        <select name="" id="" class="form-control">
        @foreach($roles as $role)
        <option value="">{{$role->role_name}}</option>
        @endforeach
        </select>
        @else
            <p>No roles found</p>
    @endif  
   

</div>
</body>
</html>
@endsection
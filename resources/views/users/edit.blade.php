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
    <h1  style="margin-left: 10px">Edit User</h1>
    {!! Form::open(['action' => ['UsersController@update', $user['id']], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group col-md-6">

        {{Form::label('name', 'Given Name: ',['class'=>' col-form-label text-md-right'])}}
        {{Form::text('first_name', $user['first_name'], ['class' => 'form-control'])}}
        {{Form::label('name', 'Last Name: ',['class'=>' col-form-label text-md-right'])}}
        {{Form::text('last_name', $user['last_name'], ['class' => 'form-control'])}}
        {{Form::label('name', 'Email: ',['class'=>' col-form-label text-md-right'])}}
        {{Form::text('email', $user['email'], ['class' => 'form-control'])}}
        {{Form::label('name', 'Date of Birth: ',['class'=>' col-form-label text-md-right'])}}
        {{Form::date('birth_date', $user['birth_date'], ['class' => 'form-control'])}}

        {{--@if(count($users) > 0)--}}

            {{--@foreach($users as $user)--}}
        {{--{{Form::label('roles','Role: ',['class'=>'col-form-label text-md-right'])}}--}}
        {{--{{Form::select('email', $user['email'], ['class' => 'form-control'])}}--}}
            {{--@endforeach--}}
            {{--@endif--}}
        {{Form::label('name', 'Role: ',['class'=>' col-form-label text-md-right'])}}
        <select name='id' class="form-control">
            <option value="" selected="selected">Select A Role</option>
            {{--@foreach($roles as $id => $role)--}}
{{--                <option value="{!! $id !!}">{!! $role->role !!}</option>--}}
            <option value="}">ttt</option>
            {{--@endforeach--}}
        </select>
    </div>

    {{Form::hidden('_method','PUT')}}
    &nbsp;&nbsp;&nbsp;&nbsp;
    {{Form::submit('Edit', ['class'=>'btn btn-primary '])}}
    {!! Form::close() !!}
    <a href="/users/show" class="btn btn-default">Go Back</a>
</div>
{{--@endsection--}}

</body>
</html>




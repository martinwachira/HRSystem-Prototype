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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div style="margin:20px">
<div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header ion ion-person-add" style="font-family:sans-serif"> &nbsp; <a href="{{'/employees'}}">Create Account Here</a></h4>
                    </div>
                    <br>
                    {!! Form::open(['action' => 'EmployeesController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="row btn-success" style="border-radius:7px; padding:7px">
                    <div class="col-md-2">Names</div>
                    <div class="col-md-2">Email Address</div>
                    <div class="col-md-2">Employee No</div>
                    <div class="col-md-2">Department</div>
                    <div class="col-md-2">Position</div>
                    <div class="col-md-2">Date of Birth</div>
                    </div>
                    <br>
                    @if(count($employees) > 0)
                    @foreach($employees as $employee)
                    <hr>
                    <div class="row" style="font-family:sans-serif; height:20px">
                    <div class="col-md-2"><strong><a href="/employees/{{$employee->id}}/edit">{{$employee->empNames}}</a></strong></div>
                    <div class="col-md-2">{{$employee->email}}</div>
                    <div class="col-md-2">{{$employee->empNo}}</div>
                    <div class="col-md-2">{{$employee->department}}</div>
                    <div class="col-md-2">{{$employee->position}}</div>
                    <div class="col-md-2">{{$employee->birth_date}}</div>
                    </div>
                    @endforeach
                    <br>
                    <hr>
                    {{$employees->links()}}
                    @else
                        <p>No Employees found</p>
                    @endif
</div>
</div>
</body>
@endsection
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
<div class="col-md-12">
<div class="card">
    <h4 class="card-header ion ion-person" style="font-family:sans-serif; color:#f39c12"> &nbsp; <strong>{{$employee->empNames}}`s</strong> Account </h4>
</div>
<div class="container">
{!! Form::open(['action' => ['EmployeesController@update', $employee->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

<div class="row">
<div class="col-md-6">
<br>
{{Form::label('name', 'Given Name:', ['class'=>'col-form-label'])}}
{{Form::text('empNames', $employee['empNames'], ['class' => 'form-control'])}}
{{Form::label('email', 'Email Address:', ['class'=>'col-form-label'])}}
{{Form::text('email', $employee['email'], ['class' => 'form-control'])}}
{{Form::label('empNo', 'Employee No.:', ['class'=>'col-form-label'])}}
{{Form::text('empNo', $employee['empNo'], ['class' => 'form-control'])}}
{{Form::label('name', 'NSSF No:', ['class'=>'col-form-label'])}}
{{Form::text('nssf', $employee['nssf'], ['class' => 'form-control'])}}
{{Form::label('name', 'NHIF No:', ['class'=>'col-form-label'])}}
{{Form::text('nhif', $employee['nhif'], ['class' => 'form-control'])}}
{{Form::label('name', 'KRA Pin:', ['class'=>'col-form-label'])}}
{{Form::text('kra', $employee['kra'], ['class' => 'form-control'])}}
{{Form::label('name', 'Department:', ['class'=>'col-form-label'])}}
<select name="department" id="department" class="form-control">
    <option value="Accounts">Accounts</option>
    <option value="Information Technology">Information Technology</option>
    <option value="Marketing">Marketing</option>
    <option value="Sales">Sales</option>
    <option value="Legal">Legal</option>
    <option value="Human Resource">Human Resource</option>
</select>
{{Form::label('name', 'Position:', ['class'=>'col-form-label'])}}
{{Form::text('position', $employee['position'], ['class' => 'form-control'])}}
{{Form::label('name', 'Birth Date:', ['class'=>'col-form-label'])}}
{{Form::date('birth_date', $employee['birth_date'], ['class' => 'form-control'])}}
{{Form::label('name', 'Password:', ['class'=>'col-form-label'])}}
{{Form::text('password', $employee['password'], ['class' => 'form-control'])}}
</div>

<div class="col-md-6">
<br><br>
<img src="/images/hr.png" alt="img" height=550px width=700px>
</div>
</div>
<hr>
<div class="row">
<div class="col-md-6">
{{Form::hidden('_method','PUT')}}
    {{Form::submit('Edit Account', ['class' => 'btn btn-success '])}}
{!! Form::close() !!}
</div>
<div class="col-md-4">
{!!Form::open(['onsubmit'=>"return confirm('Are you sure you want to delete this Account?')", 'action' => ['EmployeesController@destroy', $employee->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete Account', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
</div>
</div>
</div>
</div>
</div>
</body>
@endsection

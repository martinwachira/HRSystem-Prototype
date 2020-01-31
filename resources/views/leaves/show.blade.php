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
    <h4 class="card-header ion ion-checkmark" style="font-family:sans-serif"><a href="{{'/leaves'}}">&nbsp;Leave Requests</a> </h4>
</div>
<div class="container">
     {!! Form::open(['action' => 'LeavesController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
     @csrf
     <br>
                    {!! Form::open(['action' => 'LeavesController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="row btn-success" style="border-radius:7px; padding:7px">
                    <div class="col-md-2">Names</div>
                    <div class="col-md-2">Leave Commence Date</div>
                    <div class="col-md-2">Leave Final Date</div>
                    <div class="col-md-2">Holiday</div>
                    <div class="col-md-2">Reason</div>
                    <div class="col-md-2">Number of Days Requested</div>
                    </div>
                    <br>
                    @if(count($leaves) > 0)
                    @foreach($leaves as $leave)
                    <hr>
                    <div class="row" style="font-family:sans-serif; height:20px">
                    <div class="col-md-2"><strong><a href="/leaves/{{$leave->id}}/edit">{{$leave->empNames}}</a></strong></div>
                    <div class="col-md-2">{{$leave->startDate}}</div>
                    <div class="col-md-2">{{$leave->stopDate}}</div>
                    <div class="col-md-2">{{$leave->holiday}}</div>
                    <div class="col-md-2">{{$leave->reason}}</div>
                    <div class="col-md-2">{{$leave->days}}</div>
                    </div>
                    @endforeach
                    <br>
                    <hr>
                    {{$leaves->links()}}
                    @else
                        <p>No Leave Requests found</p>
                    @endif
                    </div>
</div>
</div>
</body>
@endsection

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

<div class="card-body">
    <h1 style="margin-left: 250px">Add Skills</h1>
    {{--    {!! Form::open(['action'=>['SkillsController@store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}--}}
    {{--    {!! Form::open(['action' => 'SkillsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}--}}
    {{--<div class="form-group row" >--}}
    {{--{{Form::label('name', 'Skill Name: ',['class'=>' col-form-label text-md-right'])}} &nbsp;--}}
    {{--{{Form::text('skill_name','',['class'=>'form-control col-md-4','placeholder'=>'Name'])}}--}}
    {{--</div>--}}
    {{--{{Form::submit('Submit',['class'=>'btn btn-primary '])}}--}}
    {{--{!! Form::close() !!}--}}
    {{--<form method="POST" action="SkillsController@store">--}}
    {!! Form::open(['action' => 'SkillsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Skill Name') }}</label>

        <div class="col-md-6">
            <input id="skill_name" type="text" class="form-control{{ $errors->has('skill_name') ? ' is-invalid' : '' }}" name="skill_name" value="{{ old('skill_name') }}" required autofocus>

            @if ($errors->has('skill_name'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('skill_name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
    </form>
</div>
</body>
</html>
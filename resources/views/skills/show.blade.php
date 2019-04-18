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

    <a href="/skills" class="btn btn-default">Go Back</a>
    <h1 class="col-md-4">{{$skill->skill_name}}</h1>
    {{--<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">--}}
{{--    <small>Written on {{$skills->created_at}} by {{$skills->user->name}}</small>--}}
    <small class="col-md-4 col-form-label text-md-right">Written on {{$skill->created_at}}</small>
    <hr>
{{--    @if(!Auth::guest())--}}
{{--        @if(Auth::user()->id == $skills->user_id)--}}
            <a href="/skills/{{$skill->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['SkillsController@destroy', $skill->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        {{--@endif--}}
    {{--@endif--}}
</div>

@endsection
</body>
</html>


{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    {{--<a href="/skills" class="btn btn-default">Go Back</a>--}}
    {{--<h1>{{$post->title}}</h1>--}}
    {{--<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">--}}
    {{--<br><br>--}}
    {{--<div>--}}
        {{--{!!$post->body!!}--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>--}}
    {{--<hr>--}}
    {{--@if(!Auth::guest())--}}
        {{--@if(Auth::user()->id == $post->user_id)--}}
            {{--<a href="/skills/{{$skill->id}}/edit" class="btn btn-default">Edit</a>--}}

            {{--{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
            {{--{{Form::hidden('_method', 'DELETE')}}--}}
            {{--{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}--}}
            {{--{!!Form::close()!!}--}}
        {{--@endif--}}
    {{--@endif--}}
{{--@endsection--}}
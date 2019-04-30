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

<br/>
<div class="card-body">
    <h1 style="margin-left: 250px"><a href="{{"admin"}}">Roles</a></h1>

    {!! Form::open(['action' => 'RolesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

        <div class="col-md-6">
            <input id="role_name" type="text" class="form-control{{ $errors->has('role_name') ? ' is-invalid' : '' }}" name="role_name" value="{{ old('role_name') }}" required autofocus>

            @if ($errors->has('role_name'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_name') }}</strong>
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
    @if(count($roles) > 0)
        @foreach($roles as $role)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/roles/{{$role->role_id}}">{{$role->role_name}}</a></h3>
                        <small>Added on {{$role->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach

        {{$roles->links()}}

    @else
        <p>Roles not Found</p>
    @endif
@endsection


</body>

</html>
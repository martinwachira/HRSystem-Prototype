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
<div class="container">
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



<table class="table table-bordered">
    <thead class="table-dark">
    <th>Name</th>
    <th>Actions</th>
    </thead>


    <tbody class="table-primary">

    @if(count($roles) > 0)
        @foreach($roles as $role)

            <tr>
                <td>{{$role->role_name}}</td>

                <td><a style="color:green" href="/roles/{{$role['role_id']}}/edit" >
                        {!!Form::open(['onsubmit' => "return confirm('Do you really want to remove this skill?')",'action' => ['RolesController@destroy', $role['role_id']], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        <span class="ion-edit" > Edit</span></a>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

                    <span class="ion-alert">
                                    {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn-danger'])}}
                        {!!Form::close()!!}
                                </span></td>
            </tr>
        @endforeach
        {{$roles->links()}}
    </tbody>
</table>

    @else
        <p>Roles not Found</p>
    @endif
@endsection
</div>

</body>

</html>
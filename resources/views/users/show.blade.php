@extends('layouts.app')


{{--<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">--}}
{{--<!-- Font Awesome -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">--}}
{{--<!-- Ionicons -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">--}}
{{--<!-- Theme style -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/AdminLTE.min.css') }}">--}}
{{--<!-- AdminLTE Skins. Choose a skin from the css/skins--}}
     {{--folder instead of downloading all of them to reduce the load. -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/skins/_all-skins.min.css') }}">--}}
{{--<!-- Morris chart -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">--}}
{{--<!-- jvectormap -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">--}}
{{--<!-- Date Picker -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">--}}
{{--<!-- Daterange picker -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">--}}
{{--<!-- bootstrap wysihtml5 - text editor -->--}}
{{--<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">--}}

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

@section('content')
    <div class="container">
        <h2><a href="{{'../admin'}}">Users</a></h2>
        <table class="table table-bordered">
            <thead class="table-dark">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
            </thead>


            <tbody class="table-primary">

            @foreach($users as $user)

            <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
                <td><span class="ion-edit"><a href="{{'skills/edit'}}"> Edit</a></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class="ion-alert">  Delete</span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
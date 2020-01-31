@extends('layouts.app')
@section('content')
 <head>
<link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.css') }}">
{{--<link rel="stylesheet" href="{{ asset('materialize-admin/css/style.css') }}">--}}
<link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.style.css') }}">
<link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.custom.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">

<script src="{{ asset('materialize-admin/js/materialize.js') }}"></script>
<script src="{{ asset('materialize-admin/js/materialize.min.js') }}"></script>
<script src="{{ asset('materialize-admin/js/materialize.custom-script.min.js') }}"></script>

<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 </head>

 <div class="card" style="margin:10px">
    <h4><a href="{{'../admin'}}"><strong>Users</strong></a></h4>
    </div>
 <div class="container">
     {!! Form::open(['action' => 'UsersController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
     @csrf
        <table class="table table-bordered">
            <thead class="table-dark">
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
            </thead>

            <tbody class="table-primary">                
            @if(count($users) > 0)
            @foreach($users as $user)
            <tr>
            <td>{{$user->first_name}}  {{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role_name}}</td>
             <td><a style="color:green" href="/users/{{$user->id}}/edit" >
                {!!Form::open(['onsubmit'=>"return confirm('Are you sure you want to delete this Account?')", 'action' => ['UsersController@destroy', $user->id], 'method' => 'POST'])!!}
                    <span class="fa fa-edit" >Edit</span></a>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                    <!-- <span class="fa fa-trash-o"> -->
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn-danger'])}}
                {!!Form::close()!!}
                     </span>
             </td>
              </tr>
            @endforeach
        {{--{{$users->links()}}--}}
            </tbody>
        </table>
        @else
            <p>No users found</p>
        @endif        
    </div>

@endsection


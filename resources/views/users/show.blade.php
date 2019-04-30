@extends('layouts.app')
@section('content')
 <head>
<link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.css') }}">
{{--<link rel="stylesheet" href="{{ asset('materialize-admin/css/style.css') }}">--}}
<link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.style.css') }}">
<link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.custom.css') }}">

<script src="{{ asset('materialize-admin/js/materialize.js') }}"></script>
<script src="{{ asset('materialize-admin/js/materialize.min.js') }}"></script>
<script src="{{ asset('materialize-admin/js/materialize.custom-script.min.js') }}"></script>

<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 </head>

 <div class="container">
        <h2><a href="{{'../admin'}}">Users</a></h2>
        <table class="table table-bordered">
            <thead class="table-dark">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
            </thead>


            <tbody class="table-primary">

            @if(count($users) > 0)

            @foreach($users as $user)

            <tr>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            {{--<td><span class="ion-edit"><a href="/users/{{$user->id}}/edit"> Edit</a></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class="ion-alert">  Delete</span></td>--}}
             <td><a style="color:green" href="/users/{{$user->id}}/edit" >
                        {!!Form::open(['onsubmit'=>"return confirm('Are you sure you want to delete this Account?')", 'action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        <span class="ion-edit" > Edit</span></a>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

                    <span class="ion-alert">
                                    {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn-danger'])}}
                        {!!Form::close()!!}
                     </span>
             </td>
            </tr>
            @endforeach
{{--            {{$users->links()}}--}}
            </tbody>
        </table>
        @else
            <p>No users found</p>
        @endif
    </div>

@endsection


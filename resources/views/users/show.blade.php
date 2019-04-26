@extends('layouts.app')

@section('content')
    <div class="container">
        <h2><a href="{{'../admin'}}">Users</a></h2>
        <table class="table table-bordered">
            <thead class="table-primary">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            </thead>


            <tbody class="table-dark">

            @foreach($users as $user)

            <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
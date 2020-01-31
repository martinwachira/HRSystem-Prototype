
@extends('layouts.app')
@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.css') }}">
        {{--<link rel="stylesheet" href="{{ asset('materialize-admin/css/style.css') }}">--}}
        <!-- <link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.style.css') }}"> -->
        <!-- <link rel="stylesheet" href="{{ asset('materialize-admin/css/materialize.custom.css') }}"> -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">

        <script src="{{ asset('materialize-admin/js/materialize.custom-script.min.js') }}"></script>
        <script src="{{ asset('materialize-admin/js/materialize.js') }}"></script>
        <script src="{{ asset('materialize-admin/js/materialize.min.js') }}"></script>


        <div class="container">
            <div class="w3-container">
                <button onclick="getElementById('id01').style.display='block'" class="btn btn-primary">Add Skill</button>
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                            <div class="card-body">
                                {!! Form::open(['action' => 'SkillsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">Close</span>
                                        <input id="skill_name" type="text" class="form-control{{ $errors->has('skill_name') ? ' is-invalid' : '' }}" name="skill_name" value="{{ old('skill_name') }}" required autofocus>

                                        @if ($errors->has('skill_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('skill_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- <div class="form-group row mb-0"> -->
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('New') }}
                                        </button>
                                    <!-- </div> -->
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </head>
            <div class="row">
                &nbsp;&nbsp;&nbsp;
                {{--<button onclick="document.getElementById('id01').style.display='block'">Add Skill</button>--}}
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead class="table-dark">
                <th>Name</th>
                <th class="pull-right">Actions</th>
                </thead>
                <tbody>
                @if(count($skills) > 0)
                    @foreach($skills as $skill)
                        <tr>
                            <td>{{$skill->skill_name}}</td>

                            <td><a style="color:green" href="/skills/{{$skill['id']}}/edit" >
                                {!!Form::open(['onsubmit' => "return confirm('Do you really want to remove this skill?')",'action' => ['SkillsController@destroy', $skill['id']], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                <i class="fa fa-edit" ></i></a>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

                                    {{Form::hidden('_method', 'DELETE')}}
                                    <span class="fa fa-trash-o" style="color:red"></spa>&nbsp;
                                    {{Form::submit('Delete',['class' => 'fa fa-trash-o'])}}
                                    {!!Form::close()!!}
                                </span></td>
                        </tr>
                    @endforeach
                    {{$skills->links()}}
                </tbody>
            </table>
            @else
                <p>No skills found</p>
            @endif
        </div>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@endsection


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


        <div class="container">
            <div class="w3-container">
                <button onclick="getElementById('id01').style.display='block'" class="btn btn-primary">Add Skill</button>
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                            {{--<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>--}}
                            <div class="card-body">

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
                                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
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
                        </div>
                    </div>
                </div>
            </div>
            </head>


            <div class="row">
                &nbsp;&nbsp;&nbsp;
                {{--<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary">Add Skill</button>--}}

                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">



                        </div>
                    </div>
                </div>

            </div>

            <table class="table table-bordered">
                <thead class="table-dark">
                <th>Name</th>
                <th>Actions</th>
                </thead>


                <tbody class="table-primary">

                @if(count($skills) > 0)
                    @foreach($skills as $skill)

                        <tr>
                            <td>{{$skill->skill_name}}</td>

                            <td><a style="color:green" href="/skills/{{$skill['id']}}/edit" >
                                {!!Form::open(['onsubmit' => "return confirm('Do you really want to remove this skill?')",'action' => ['SkillsController@destroy', $skill['id']], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                <span class="ion-edit" > Edit</span></a>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

                                <span class="ion-alert">
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn-danger'])}}
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

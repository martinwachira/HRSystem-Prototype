@extends('layouts.app')

@section('content')
    <h1 style="margin-left: 250px">Skills</h1>
    @if(count($skills) > 0)
        @foreach($skills as $skill)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/skills/{{$skill->id}}">{{$skill->skill_name}}</a></h3>
                        <small>Written on {{$skill->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach

        {{--{{$skills->links()}}--}}

        <a href="{{url()->previous()}}">Go Back</a>
    @else
        <p>No skills found</p>
    @endif
@endsection

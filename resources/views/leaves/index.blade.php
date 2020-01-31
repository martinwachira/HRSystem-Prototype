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
<div  style="margin:10px">
<div class="row justify-content-center">
<div class="col-md-12">
    <div class="card">
        <h4 class="card-header ion ion-calendar" style="font-family:sans-serif"> <a href="{{'leaves/show'}}">&nbsp; Grant Leave</a></h4>
</div>

<!--start of the first section (leave request)-->

    {{--<form method="POST" action="{{ route('register') }}">--}}
    {!! Form::open(['action' => 'LeavesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf

    {!! Form::open(['action' => 'LeavesController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
    @csrf
    <div class="row" style="margin-top:20px">
    <div class="col-md-2">
    <label for="">Employee</label>
    <select name="empNames" id="" class="form-control">
    <br>
    <option value="">Select Employee</option>
    <option disabled></option>
    @if(count($employees) > 0)    
    @foreach($employees as $employee)
    <option value="{{$employee->empNames}}">{{$employee->empNames}}</option>
   <option disabled></option>
    @endforeach
    </select>
    </div>
    @else
        <p>xxxxx</p>
    @endif

    <div class="col-md-2">
    <label for="">From</label>
    <input type="date" name="startDate" id="beginDate" class="form-control" >
    </div>

    <div class="col-md-2">
    <label for="">To</label>
    <input type="date" name="stopDate" id="endDate" class="form-control" onchange="cal()">
    </div>

    <div class="col-md-2">
    <label for="holiday" class="col-md-4 col-form-label text-md-right">Holiday</label>

    <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Yes</label>
    <div>
    <input id="yes" type="radio" class="{{ $errors->has('yes') ? ' is-invalid' : '' }}" name="holiday" value="Yes" required autofocus>
    @if ($errors->has('yes'))
    <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('yes') }}</strong>
    </span>
    @endif
    </div>
    &nbsp;<label for="name" class="col-md-2 col-form-label text-md-right">No</label>
    <div>
    <input id="no" type="radio" class="{{ $errors->has('no') ? ' is-invalid' : '' }}" name="holiday" value="No" required autofocus>
    @if ($errors->has('no'))
    <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('no') }}</strong>
    </span>
    @endif
    </div>
    </div>

    </div>

    <div class="col-md-2">
    <label for="">Reason</label>
    <input type="text" name="reason" id="" class="form-control">
    </div>

    <div class="col-md-2">
    <label for="">Total Number of Days</label>
    <input type="number" name="days" id="tNumbers" class="form-control" onchange="GetDays(this.value)">
    </div>
</div>
<button type="submit" class="btn btn-success">Submit Request</button>
<hr>
</form>

<!--end of the first section (leave request)-->

<!--begin of the second section (view leaves)-->



<!--end of the second section (leaves view)-->
</div>
</div>

<script>

  function GetDays(){
                var to = new Date(document.getElementById("endDate").value);
                var from = new Date(document.getElementById("beginDate").value);
                    if (to < Date.now()) {
                        alert("404! Start Date cannot be previous than today!");
                    }else if(to <= from){
                        alert("404! Final Date cannot be earlier than Start Date");
                    }else{
                        return parseInt((to - from) / (24 * 3600 * 1000)); 
                    }
        }

        function cal(){
        if(document.getElementById("endDate")){            
            document.getElementById("tNumbers").value=GetDays();
         }  
        }
</script>

</body>
@endsection


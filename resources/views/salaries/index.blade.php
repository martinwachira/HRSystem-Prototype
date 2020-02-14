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
<div style="margin:20px">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
    <h4 class="card-header ion ion-calculator" style="font-family:sans-serif"><a href="{{'/admin'}}">&nbsp;Salaries</a> </h4>
</div>
     <br>
     {{--<form method="POST" action="{{ route('register') }}">--}}
    {!! Form::open(['action' => 'SalariesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf

    {!! Form::open(['action' => 'SalariesController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
    @csrf

    <div class="row" style="margin-top:20px">
    <div class="col-md-3">    
    <h4 for=""><strong>Employee</strong></h4>
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
    <h4 for=""><strong>Gross Salary</strong></h4>
    <input type="text" class="form-control" name="gross" placeholder="Gross Salary" id="gross" onchange="calcNet()">
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;

    <div class="card col-md-3">
    <div class="card-header"><h4><strong>Benefits</strong></4></div>
    <br>    
    <label for="">Bonus</label> 
    <input type="text" id="bonus" class="form-control" name="bonus" placeholder="Bonus" onchange="calc()">
    <br>
    <label for="">Allowances</label>
    <input type="text" id="allowance" class="form-control" name="allowance" placeholder="Other Allowances" onchange="calc()">    
    <br>
    <div class="row">
    <div class="col-md-4">
    <h4 for="total"><strong>Total:</strong></h4>
    </div>
    <div class="col-md-8">
    <input type="text" id="total_benefit" class="form-control" name="total_benefits" placeholder="Total Benefits" onchange="getBonus(this.value)">
    </div>
    </div> 
    </div>


    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="card col-md-3">
    <div class="card-header"><h4><strong>Deductions</strong></h4></div>
    <br>    
    <label for="">NHIF</label> 
    <input type="text" class="form-control" name="nhif" placeholder="nhif" id="nhif" onchange="calcDed()">
    <br>
    <label for="">NSSF</label>
    <input type="text" class="form-control" name="nssf" placeholder="nssf" id="nssf" onchange="calcDed()">
    <br>
    <label for="">KRA</label>
    <input type="text" class="form-control" name="kra" placeholder="kra" id="kra" onchange="calcDed()">
    <br>
    <div class="row">
    <div class="col-md-4">
    <h4 for="total"><strong>Total:</strong></h4>
    </div>
    <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Total Deductions" name="total_deductions" id="total_deduction" onchange="getDeductions(this.value)">
    </div>
    </div> 
    <br> 
    </div>
    </div>

    <br>
    <hr>
    <div class="row">
    <div class="col-md-6" >
    <div class="row">
    <div class="col-md-2">
    <h4 for="net"><strong>Net Salary</strong></h4>
    </div>
    <div class="col-md-8">
    <input type="text" class="form-control" placeholder="Total Net" name="net" id="net" onchange="getNet(this.value)">
    </div>
    </div>
    </div>

    <div class="col-md-2">
    <button type="submit" class="btn btn-success">Post Salary</button>
    </div>
    </div> 

</div>
</div>
</div>

<script src="{{ asset('js/custom.js') }}"></script>
</body>
@endsection
                    

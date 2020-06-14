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
<div class="container">
<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <h4 class="card-header ion ion-person" style="font-family:sans-serif"> &nbsp; <a href="{{'employees/show'}}">View Registered Accounts</a> </h4>

                    <div class="card-body">
                        {{--<form method="POST" action="{{ route('register') }}">--}}
                            {!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Employee Names') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('empNames') ? ' is-invalid' : '' }}" name="empNames" value="{{ old('empNames') }}" required autofocus>

                                    @if ($errors->has('names'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('empNames') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Employee No.') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('empNo') ? ' is-invalid' : '' }}" name="empNo" value="{{ old('empNo') }}" required autofocus>

                                    @if ($errors->has('empNo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('empNo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NSSF No.') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('nssf') ? ' is-invalid' : '' }}" name="nssf" value="{{ old('nssf') }}" required autofocus>

                                    @if ($errors->has('nssf'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nssf') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NHIF No.') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('nhif') ? ' is-invalid' : '' }}" name="nhif" value="{{ old('nhif') }}" required autofocus>

                                    @if ($errors->has('nhif'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nhif') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('KRA Pin.') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('kra') ? ' is-invalid' : '' }}" name="kra" value="{{ old('kra') }}" required autofocus>

                                    @if ($errors->has('kra'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kra') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Department.') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department') }}" required autofocus>

                                    @if ($errors->has('department'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Department.') }}</label>

                                <div class="col-md-6">
                                    <select name="department" id="department" class="form-control">
                                    <option value="Accounts">Accounts</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Sales">Sales</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Human Resource">Human Resource</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position.') }}</label>

                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}" required autofocus>

                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="grosspay" class="col-md-4 col-form-label text-md-right">{{ __('Gross Salary.') }}</label>

                                <div class="col-md-6">
                                    <input id="grosspay" type="text" class="form-control{{ $errors->has('grosspay') ? ' is-invalid' : '' }}" name="grosspay" value="{{ old('grosspay') }}" required autofocus>

                                    @if ($errors->has('grosspay'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('grosspay') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender :') }}</label>

                            <div class="form-group row">
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Male') }}</label>

                                <div>
                                    <input id="male" type="radio" class="{{ $errors->has('male') ? ' is-invalid' : '' }}" name="gender" value="M" required autofocus>
                                    @if ($errors->has('male'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('male') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Female') }}</label>

                                <div>
                                    <input id="female" type="radio" class="{{ $errors->has('female') ? ' is-invalid' : '' }}" name="gender" value="F" required autofocus>
                                    @if ($errors->has('female'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('female') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_date" type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required>

                                    @if ($errors->has('birth_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
</div>

</div>
</body>
@endsection
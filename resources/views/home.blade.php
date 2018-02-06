@extends('layouts.app')

@section('header')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css"> 
        select{
            width:100px;
            height: 35px;
        }
        .size{
            width: 400px;
            margin: 0px 740px;
        }
        .size2{
            width: 430px;
            margin: 0px 710px;
        }
        .size3{
            width: 410px;
            margin: 0px 730px;
        }

    </style>

@endsection

@section('content')

@if($user[0]->language==1)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<form class="size btn panel" action="/home" method="POST">
    {{ csrf_field() }}
    Choose your profile language:
    <select id="lang" name="language">
        <option value="1">English</option>
        <option value="2">Русский</option>
        <option value="3">Українська</option>
    </select>
<button type="submit" class="btn btn-primary">Accept</button>

@endif
@if($user[0]->language==2)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Панель приборов</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы вошли в систему!
                </div>
            </div>
        </div>
    </div>
</div>
<form class="size2 btn panel" action="/home" method="POST">
    {{ csrf_field() }}
    Выберите профильный язык:
    <select id="lang" name="language">
        <option value="1">English</option>
        <option value="2">Русский</option>
        <option value="3">Українська</option>
    </select>
<button type="submit" class="btn btn-primary">Подтвердить</button>

@endif
@if($user[0]->language==3)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Панель приладів</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы увійшли до системи!
                </div>
            </div>
        </div>
    </div>
</div>
<form class="size3 btn panel" action="/home" method="POST">
    {{ csrf_field() }}
    Виберіть профільну мову:
    <select id="lang" name="language">
        <option value="1">English</option>
        <option value="2">Русский</option>
        <option value="3">Українська</option>
    </select>
<button type="submit" class="btn btn-primary">Підтвердити</button>
@endif
</form>
@endsection

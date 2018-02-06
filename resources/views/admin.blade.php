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
        table {
    margin: 5px auto;
    width: 1100px; /* Ширина таблицы */
    background: white; /* Цвет фона таблицы */
    color-text: black; /* Цвет текста */
    border-spacing: 1px; /* Расстояние между ячейками */
   }
   td, th {
    background: white; /* Цвет фона ячеек */
    padding: 10px; /* Поля вокруг текста */
     width: 45%;
}   
    .sub{
        margin:20px 1200px;
    }
    li {
    list-style-type: none; /* Убираем маркеры */
   }
    .size{
      
        width: 100px;
         font-size: 30px; 
         font-size: 1.5em;
         
          }
    .box{
        width: 300px;
    }
          a{
     text-decoration: none;
    }
    
    </style>

@endsection




@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body size">
                  <table class="box">
                        <tr>   
                        
                            <td><a href="{{route('change')}}">Assign Administrator</a></td>
                            <td><a href="{{route('cancel')}}">Remove administrator</a></td>
                        </tr>
                        <tr>
                            <td><a href="{{route('show.users')}}">Display all users</a></td>
                            <td><a href="{{route('show.admins')}}">Display all admins</a></td>
                        </tr>
                        <tr>
                            <td><a href="{{route('find')}}">Find all</a></td>
                        </tr>
                           
                </table>
                    
                </div>

            </div>

        </div>

    </div>

</div>
      

@endsection

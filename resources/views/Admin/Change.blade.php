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
    padding: 15px; /* Поля вокруг текста */
     width: 45%;
}   
    .sub{
        margin:20px 1200px;
    }
    .sub1{
        margin:20px 200px;
    }
    .size{
         font-size: 30px; 
         font-size: 1.5em;
         margin: 0px 1450px;
          }
    }
    </style>

@endsection




@section('content') 
        <?php $count=0 ?>
        <a class="panel size" href="{{route('admin.dashboard')}}">Back</a>
        <form action="/admin/changeuser" method="POST">
            {{ csrf_field() }}
            <h2 class="sub1"><strong>USERS:</strong></h2>
                    <?php foreach ($users as $user): ?>
                        <?php $count++ ?>
                        
                        <table >
                            <tr >
                            <td >{!!$user->name!!}</td>
                            <td>{!!$user->email!!}</td>
                            <td>{!!$user->created_at!!}</td>
                            <td><input type="checkbox" name="answer" value="{{$count}}"/></td>
                        </tr>
                        </table>
        <?php endforeach ?>  
        <div class="but ">
            <center>
                <input  type="submit" name="submit">
                <button><a href="{{route('change')}}">Refresh</a></button> 
            </center>
        </div>
    </form>
@endsection

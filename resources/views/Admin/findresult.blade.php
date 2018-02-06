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
    
    .size{
         font-size: 30px; 
         font-size: 1.5em;
         margin: 0px 1450px;
          }
    
    .find{
        display: inline-block;
        margin: 0px 80px;

    }
    h2 {
         margin:20px 80px;
    }
    </style>

@endsection




@section('content') 
        <?php $count=0 ?>
        <a class="panel size" href="{{route('admin.dashboard')}}">Back</a>
        <form action="/admin/find" method="POST">
            {{ csrf_field() }}
                <div class="find panel">
                    <label>Find 'Name':
                        <input type="name"  name="Text" value="{{old('Text')}}" placeholder="Example" required>
                        Output accounts({{old('language')}}):
                <select name="language">
                         <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="5">5</option>
                         <option value="10">10</option>
                         <option value="20">20</option>
                         <option value="50">50</option>
                         <option value="100">100</option>
                </select>
                        <input type="submit" name="submit">
                        <button><a href="{{route('find')}}">Refresh</a></button>
                    </label>
                </div>
      

        
        
            <h2><strong>USERS</strong></h2>
                    <?php foreach ($users as $user): ?>
                        <?php $count++ ?>
                        
                        <table >
                            <tr >
                            <td >{!!$user->name!!}</td>
                            <td>{!!$user->email!!}</td>
                            <td>{!!$user->created_at!!}</td>
                            </tr>
                        </table>
        <?php endforeach ?>
        
        <?php $count=0 ?>
        
                <h2><strong>Admins</strong></h2>
                        <?php foreach ($admins as $adm): ?>
                        <?php $count++ ?>
                        <table >
                            <tr >
                            <td >{!!$adm->name!!}</td>
                            <td>{!!$adm->email!!}</td>
                            <td>{!!$adm->job_title!!}</td>
                            <td>{!!$adm->created_at!!}</td>
                            </tr>
                        </table>
        <?php endforeach ?>
       
        
        </form>
                

@endsection

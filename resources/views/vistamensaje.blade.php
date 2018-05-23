@extends('layouts.app')

@section('content')


<nav>
	<ul><a href="{{ route('visualcon') }}">Rentas-Notificaciones</a> / Mensajes</ul>
</nav>
<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


<br>

<p>  Para: {{ Auth::user()->name }}    ( CUIT   {{ Auth::user()->id }} )</p>				ID MENSAJE:132111


<h2>Tema de Notificacion</h2>	

<p>Cuerpo de la notificacion</p>


<a href="" class="btn btn-primary">Volver</a>


@endsection


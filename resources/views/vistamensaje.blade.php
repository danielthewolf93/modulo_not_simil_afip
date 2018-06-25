@extends('layouts.app2')

@section('content')



	<ul><a href="{{ route('visualcon') }}">Rentas-Notificaciones</a> / Mensajes</ul>

<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
    <div class="panel panel-body">




<div class="row">
<div class="col-xs-8">
  

<h5>  Para: {{ Auth::user()->name }}    ( CUIT   {{ Auth::user()->id }} )</h5>				
</div>

<div class="col-xs-4">
ID MENSAJE:{{ $id_mensaje }}
</div>

</div>




@foreach ($notificaciones as $notif)
      
    <h2 style="text-align:center;">{{$notif->tema_notif}}</h2>
   

   
  <div  class="alert alert-success">  <p style="text-align:center;">{{ ($notif->texto_notific) }}</p> </div>
    
       
@if($notif->adjunto=='vacio')

<p style="text-align:center;">No hay datos adjuntos</p>

@endif

@if($notif->adjunto=='si')

<p>Ventana</p>

@php($link="http://www.educoas.org/portal/bdigital/contenido/valzacchi/ValzacchiCapitulo-4New.pdf")


<div  style="text-align:center">

<iframe src="http://docs.google.com/viewerng/viewer?url={{ $link }}&embedded=true" 
style="width:600px; height:500px; margin:0px" class="panel panel-default" frameborder="0"></iframe>



</div>

@endif 


@if($notif->adjunto>1)

{{--<p>Debe ir el modelo aqui,generarlo.</p>  --}} 



@foreach ($modeloInt as $mode)
{{-- $mode->cuit_contrib --}}

{{-- $mode->tipo_modelo --}}


{{-- Aqui va el modelo segun el texto fijo desde la base de datos o sino muestro el texto segun el tipo de modelo indicado --}}



<h1 style="text-align:center;">Modelo {{ $mode->tipo_modelo }}</h1>
    <label for="">Fecha :</label>
       {{ $mode->dia_referenc }}
      <br>
      <label for="">Cuit:</label>
        {{ $mode->cuit_contrib }}

     <div class="form-group">

  
@foreach($modeltip as $mtipo)

    <p> {{ $mtipo->encabezado }}  </p>
   
@endforeach

  <div class="contener">
  


      <h3>Detalle</h3>
      

      

        <table class="table">
    <thead>
      <tr>
        
        <th>Inscripc/Matricula</th>
        <th>Periodo</th>
        <th>Tributo</th>
        <th>Monto</th>
        

        
   

        
      </tr>


 
      
    @foreach($modeloIntDet as $modeDet )
     
    <tr> 
    <th>{{$modeDet->matricula_inscripcion  }}</th>
    <th>{{ $modeDet->periodo }} </th>
    <th>{{ $modeDet->tributo }}</th>
    <th>${{ $modeDet->importe }}</th>
    </tr>

    @endforeach

 





    </thead>
      <tbody>

    </tbody>
    </table>
      
      <p> {{ $mtipo->cuerpo }} </p>
    

    <br>

            <p>{{ $mtipo->pie_pagina }}</p>
      
    <br>

  {{-- $mode->id --}}





   <a href="{{ route('imprimir_msj',[$mode->id]) }}" class="btn btn-success" ><i class="glyphicon glyphicon-print"></i> Imprimir</a> 

   <br>





@endforeach



@endif

@endforeach


<br>





<a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
@endsection


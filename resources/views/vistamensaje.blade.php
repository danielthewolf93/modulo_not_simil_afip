@extends('layouts.app')

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


<br>

<p>  Para: {{ Auth::user()->name }}    ( CUIT   {{ Auth::user()->id }} )</p>				ID MENSAJE:{{ $id_mensaje }}








@foreach ($notificaciones as $notif)
        
    <h2>{{$notif->tema_notif}}</h2>

    <p>{{ ($notif->texto_notific) }}</p>
       
@if($notif->adjunto=='vacio')

<p>No hay datos adjuntos</p>

@endif

@if($notif->adjunto=='si')

<p>Ventana</p>


<iframe src="http://docs.google.com/gview?url=http://es.tldp.org/COMO-INSFLUG/es/pdf/Linuxdoc-Ejemplo.pdf&embedded=true" 
style="width:600px; height:500px;" frameborder="0"></iframe>


@endif 


@if($notif->adjunto>1)

{{--<p>Debe ir el modelo aqui,generarlo.</p>  --}} 



@foreach ($modeloInt as $mode)
{{-- $mode->cuit_contrib --}}

{{-- $mode->tipo_modelo --}}


{{-- Aqui va el modelo segun el texto fijo desde la base de datos o sino muestro el texto segun el tipo de modelo indicado --}}



<h1 style="position: center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Modelo {{ $mode->tipo_modelo }}</h1>
    <label for="">Fecha :</label>
       {{ $mode->dia_referenc }}
      <br>
      <label for="">Cuit:</label>
        {{ $mode->cuit_contrib }}

     <div class="form-group">

  
    <p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

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
      
      <p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

    <br>

            <p>----------------</p>
      
    <br>

  {{-- $mode->id --}}





   <a href="{{ route('imprimir_msj',[$mode->id]) }}" class="btn btn-success" >Imprimir</a> 

   <br>
















@endforeach



@endif

@endforeach


<br>


<a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>


@endsection


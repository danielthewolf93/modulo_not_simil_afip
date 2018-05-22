@extends('layouts.app')



@section('content')


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

<h1><i &nbsp class="fa fa-address-card" ></i>&nbspJuan Perez</h1>
<h3>&nbsp&nbsp&nbspCuit 20-37462532-3</h3>
<br>
<br>


			</div>

		</div>

	</div>

</div>



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

<br>
	<h3>Notificaciones</h3>
<br>
	

	<table class="table">
    <thead>
      <tr>
      	<th>Fecha</th>
        <th>Tema</th>
        <th>Despacho</th>
        <th>Contribuyente</th>
        <th>Adjunto</th>
      </tr>
    </thead>
    <tbody>
      
{{-- Cambios para terminar las notificaciones --}}

{{--agregar las notificaciones para todos ademas de traer los datos si ha sido leido o no...  --}}


{{-- ver el tema del if dentro del foreach para mostrar o no el icono de adjunto ademas de mostrar el color rojo o verde o amarillo segun el tipo de mensaje 


*ver el tema de notificaciones el contador y el tema de lectura al hacer click para que se eleimini o se vacie el contador
*
* empezar a realizar una vista distinta para el usuario normal seria el contribuyente
*
* dar distinta clase de colores utilizar lo de bootstrap o crear mi estilo para cada tipo de tema de mensaje.


*ademas poder dar la opcion al remitente empleado de elegir mediante un checkbox la importancia del mismo --}}

@foreach ($notificaciones as $notif)
    <tr>
        <td>{{ $notif->created_at }}</td>
        <td>{{ $notif->tipo_notific }}</td>
        <td>{{ $notif->id_recep }}</td>
        <td>{{ $notif->id_personal }}</td> 

    <td><i &nbsp class="glyphicon glyphicon-paperclip 
    " ></i></td>
      </tr>

@endforeach
  





      








      
    </tbody>
  </table>

			</div>

		</div>

	</div>

</div>


	



















@endsection
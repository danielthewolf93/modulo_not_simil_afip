@extends('layouts.app')



@section('content')


<ul><a href="{{ route('visualcon') }}">Rentas-Notificaciones</a> / Inicio</ul>


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
<h3>&nbsp&nbspAvisos</h3>
<h3>&nbsp&nbsp  Sin leer <a href="{{ route('visualcon') }}">{{ count ($notificacionesnleidas) }}</a>  |  Leidos  <a href="{{ route('visualcon') }}">{{ count ($notifleid) }}</a>  </h3>
<h3>&nbsp&nbsp  Archivados    <a href="{{ route('baul')}}">{{ count($notifborradas)  }}</a>  </h3> 
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
	<h3>{{$nombre}}</h3>
<br>
	

 @if(count($notificaciones)==0)


<p>&nbsp &nbsp No tiene mensajes </p>


@else 
 
	<table class="table">
    <thead>
      <tr>
        <th></th>
        <th><i &nbsp class="glyphicon glyphicon-paperclip" ></i></th>
      	<th>Fecha</th>
        <th>Tema</th>
        <th>Despacho</th>
        <th>Contribuyente</th>
        
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


<?php function activeMenu($tipo_not){
  
  if ($tipo_not == 'normal') {
    
    return 'normal';
  }
   if ($tipo_not == 'bajo') {
     
     return 'bajo';
   }
    if ($tipo_not == 'importante') {
     
     return 'importante';
   }

  }
  
   ?>

<?php function controlAdjunto($adj)
{
  
  if ($adj == 'vacio') {
    
    return ' ';
  }

  else

    return 'glyphicon glyphicon-paperclip' ;

}

 ?>

<?php function controlLectura($adj)
{
  
  if ($adj == 'activo') {
    
    return 'glyphicon glyphicon-envelope';
  }


  else

    return 'glyphicon glyphicon-ok' ;

}

?>

<?php function controlpag($routa)
{


if ($routa=='http://localhost:8000/visualizacionconts') {
  

return  'none';

}

else

return  '';


}



?>




    @foreach ($notificaciones as $notif)



        
    <tr>
        <td><i &nbsp class="{{ controlLectura($notif->notif_estado) }}" ></i></td>
        <td><i &nbsp class="{{ controlAdjunto($notif->adjunto) }}" ></i></td>
        <td class="{{ activeMenu($notif->tipo_notific) }}" >{{$notif->created_at }}</td>
        <td class="{{ activeMenu($notif->tipo_notific) }}">{{ $notif->tema_notif }}</td>
        <td class="{{ activeMenu($notif->tipo_notific) }}">{{ $notif->notif_despac }}</td> 

        <td class="{{ activeMenu($notif->tipo_notific) }}">Juan Perez</td>

        
        

      <td> <a href="{{ route('msj_notif',[$notif->id_notific,Auth::user()->id])}}" class="btn btn-primary">Ver mensaje</a> <td>
      <td> <a href="{{ route('delete_not',[$notif->id_notific]) }}" class="btn btn-primary" style="display:{{ controlpag(Request::url()) }}">X</a></td>


@endforeach
  
 




      
    </tbody>
  </table>

			</div>

		</div>

	</div>

</div>


	
@endif


















@endsection
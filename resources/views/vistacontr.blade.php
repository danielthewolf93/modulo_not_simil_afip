@extends('layouts.app2')



@section('content')

<ul><a href="{{ route('visualcon') }}">Rentas-Notificaciones</a> / Inicio</ul>


	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<body onload="setInterval('prueb()',10000)">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
<div class="panel-body">

<br>
      <div class="col-sm-6">
        

<h1><i sp class="fa fa-address-card" ></i>Juan Perez</h1> 

<h3>Cuit 20-37462532-3</h3>
</div>

<div class="media-body">
  


<h3>&nbsp&nbsp <i class="glyphicon glyphicon-bell"> </i> <a href="{{ route('visualcon') }}"> Avisos </a>  </h3>
<h3>&nbsp&nbsp  Sin leer <a href="{{ route('visualcon') }}" onclick="setInterval('prueb()',10000)"> <span class="badge">{{ count($notificacionesnleidas)  }}</span></a>  |  Leidos  <a href="{{ route('visualcon') }}"><span class="badge">{{ count($notifleid)  }}</span>       </a>  </h3>
<h3>&nbsp&nbsp <i class="glyphicon glyphicon-inbox"> </i> <a href="{{ route('baul') }}"> Archivados  </a>     <a href="{{ route('baul')}}"><span class="badge">{{ count($notifborradas)  }}</span></a>  </h3> 
</div>



<h3>Novedades</h3>

@if(count($novedades)==0)
<p>*No hay nuevas novedades.</p>
@else

<ul class="list alert alert-info">
  





      @foreach($novedades as $nov)
  

     
    *<strong>{{ $nov->texto }}<br></strong>   
     
    
        
     @endforeach

</ul>


@endif

</div>




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

<div class="alert alert-warning">
<p >&nbsp &nbsp No tiene Nuevas Notificaciones </p>
<div>


@else 
 
	<table onload="setInterval('location.reload()',15000)" class="table">
    <thead>
      <tr>
        <th></th>
        <th><i &nbsp class="glyphicon glyphicon-paperclip" ></i></th>
      	<th>Fecha</th>
        <th>Tema</th>
        <th>Despacho</th>
        
        
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
    //controlamos si solamente es un msj de texto comun.
    
    return ' ';
  }

     if ($adj > 1) {
      //controlamos modelos enviados
       
       return 'glyphicon glyphicon-exclamation-sign';
     }

     if ($adj == 'si') {
      //controlamos ruta de documentos adjuntos.
        return 'glyphicon glyphicon-paperclip' ;
     }

   

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



        
    <tr id="fila_{{ $notif->id_notific }}" onMouseOver="ResaltarFila('fila_{{ $notif->id_notific }}');" onMouseOut="RestablecerFila('fila_{{ $notif->id_notific }}')" onClick="CrearEnlace('{{ route('msj_notif',[$notif->id_notific,Auth::user()->id])}}');">
       
        <td><i &nbsp class="{{ controlLectura($notif->notif_estado) }}" ></i></td>
        <td><i &nbsp class="{{ controlAdjunto($notif->adjunto) }}" ></i></td>
        <td class="{{ activeMenu($notif->tipo_notific) }}" >{{$notif->created_at }}</td>
        <td class="{{ activeMenu($notif->tipo_notific) }}">{{ $notif->tema_notif }}</td>
        <td class="{{ activeMenu($notif->tipo_notific) }}">{{ $notif->notif_despac }}</td> 

        


        
        

      <td> <a href="{{ route('msj_notif',[$notif->id_notific,Auth::user()->id])}}" class="btn btn-primary">Ver mensaje</a> <td>
      <td> <a href="{{ route('delete_not',[$notif->id_notific]) }}" class="btn btn-danger" style="display:{{ controlpag(Request::url()) }}">X</a></td>


@endforeach
  
 

    </tbody>
  </table>

			</div>

		</div>

	</div>

</div>


<tr id="fila_<? echo $variable ?>" onMouseOver="ResaltarFila('fila_<? echo $variable ?>');" onMouseOut="RestablecerFila('fila_<? echo $variable ?>')" onClick="CrearEnlace('http://www.google.com');">

<script  type="text/javascript">

// RESALTAR LAS FILAS AL PASAR EL MOUSE
function ResaltarFila(id_fila) {
    document.getElementById(id_fila).style.backgroundColor = '#C0C0C0';
    document.getElementById(id_fila).style.cursor = 'pointer';
}
 
// RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
function RestablecerFila(id_fila) {
    document.getElementById(id_fila).style.backgroundColor = '#FFFFFF';
}
 
// CONVERTIR LAS FILAS EN LINKS
function CrearEnlace(url) {
    location.href=url;
}

</script>


<script >
          
    function prueb() {
     
     if ({{ count($notificacionesnleidas)  }}>0) {


        toastr.options.progressBar = true;
       toastr.info('Tienes {{ count($notificacionesnleidas)  }} notificaciones nuevas','{{ Auth::user()->name }}',{timeout: 5000});

     }
     

    

       
       
  }


</script>




</body>

@endif


















@endsection
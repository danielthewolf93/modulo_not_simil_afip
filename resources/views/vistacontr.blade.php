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
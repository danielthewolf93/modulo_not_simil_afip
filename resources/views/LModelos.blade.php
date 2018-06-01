@extends('layouts.app')

@section('content')	

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


<h2>Lista de Modelos guardados</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

<br>
	<h3>{{Auth::user()->name}}</h3>
<br>
	

 

@if ( count($modelos)==0 )  
<p>&nbsp &nbsp No tiene Modelos creados </p>

@else

 
	<table class="table">
    <thead>
      <tr>
        
      	<th>Fecha Creacion</th>
      	<th>Tipo Modelo</th>
      	<th>Tributo</th>
      	<th>Periodo Elegido</th>
        <th>Contribuyente</th>
        <th>Estado</th>
        <th></th>

        
      </tr>


	

@foreach($listamodel as $model)

	<tr>
		
			
		<th>{{ $model->created_at }}</th>
		<th>{{ $model->tipo_modelo }} </th>
		<th>{{ $model->tributo }}</th>
		<th>{{ $model->periodo }}</th>
		<th>{{ $model->cuit_contrib }}</th>
		<th>{{ $model->estado }}</th>
		<th><a href="" class="btn btn-warning">Editar</a></th>
		<th><a href="" class="btn btn-success">Enviar</a></th>
		<th><a href="" class="btn btn-danger">X</a></th>
		

		
@endforeach

	</tr>



    </thead>
    	<tbody>

		</tbody>
  	</table>






			</div>
			<a href="{{ route('intim') }}" class="btn btn-primary">Volver</a>

		</div>

	</div>

</div>

@endif

@endsection
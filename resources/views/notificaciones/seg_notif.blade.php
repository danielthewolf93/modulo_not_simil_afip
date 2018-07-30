@extends('layouts.app')




@section('content')



<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		
    
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



				@if(count($notificac_hist)==0)
				<div class="container">
    				<div class="row">
       					<div class="col-md-8 col-md-offset-2">
            				<div class="alert alert-success">
				<h3 style="text-align:center;">No tiene enviada ninguna notificacion</h3>

							</div>
						</div>
					</div>
				</div>
				@else

	<div class="container">
		<input type="search" name="busqueda" placeholder="..."><i class="glyphicon glyphicon-search"></i></input>
	</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


		

		
		<table id="example" class="table table-striped table-bordered" style="width:100%">
	    <thead>
	         <tr>
	         	<th>Idasd</th>
	            <th>Fecha Envio</th>
	            <th>Detalle</th>
	            <th>Contribuyente</th>
	            <th>Despacho </th>
	            <th>Tema </th>
	        </tr>
	    </thead>
		

		
			@php ($i=1)
			
			@foreach($notificac_hist as $notif_h)

			
			<tr>
				<th>{{ $i++}}</th>
				<th>{{$notif_h->created_at  }}</th>
				<th>{{$notif_h->mov_descripcion  }}({{$notif_h->updated_at}})</th>
				<th>{{$notif_h->id_recep  }}</th>
				<th>{{$notif_h->notif_despac  }}</th>
				<th>{{$notif_h->tema_notif  }}</th>
				

			</tr>

			
			
			@endforeach

		

			</table>

			</div>

		</div>
					
	</div>

</div>

@endif

<script type="text/javascript">

$(document).ready(function() {
    $('#table_id').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "scripts/server_processing.php"
    } );
} );


</script>






@endsection
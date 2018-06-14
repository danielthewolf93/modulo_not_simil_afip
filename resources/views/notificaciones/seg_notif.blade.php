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


		<input type="search" name="busqueda" placeholder="..."><i class="glyphicon glyphicon-search"></i></input>

		<br> <br>
		<table class="table table-hover table-condensed " id="table_id">
			<tr>
				<th>Fecha Envio</th>
				<th>Descripcion Movimiento </th>
				<th>Contribuyente</th>
				<th>Despacho</th>
				<th>Tema</th>
				
			</tr>
			
			
			@foreach($notificac_hist as $notif_h)


			<tr>
				<th>{{$notif_h->created_at  }}</th>
				<th>{{$notif_h->notif_estado  }}({{$notif_h->updated_at}})</th>
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
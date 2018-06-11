@extends('layouts.app')


@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generador</div>

				 <form method="POST" action="{{ route('model1')}}" >
                    {{ csrf_field() }}


								<div class="panel-body">
											


									
											<div class="form-group">
	 									    <label class="form-group">Modelo de Intimacion</label>
		                                    <select class="form-control" name="modeloform" id="modeloform">
		                                    <option value="1">Modelo 1</option>
		                                    <option value="2">Modelo 2</option>    
		                                    <option value="3">Modelo 3</option>   
		                                    </select>
	                                		</div>

									
 									<input class="form-control" type="hidden" name="id" id="id" ><!--campo que recibirá el id-->

									<label class="form-group">Cuit</label>
									<div class="form-group">
										<input type="text" name="cuit" id="cuit" placeholder="cuit_contribuyente" maxlength="11" onkeyup="autocompletar()">
									</div>
									<ul id="lista" ></ul>

									

				
									<label class="form-group">Matricula</label>
									<div class="form-group">
										<select name="matricula" id="matricula">
											
											<option value="1">Matricula1</option>
											<option value="2">Matricula2</option>
											<option value="3">Matricula3</option>
										</select>
									</div>
									
									<label class="form-group">Tributo</label>
									<div class="form-group">
										<input type="text" name="tributo" id="tributo" placeholder="tributo" maxlength="4">
									</div>
									
									

									<input type="hidden" name="fecha_creac" value="{{  date('Y-m-d') }}">


									<label class="form-group">Fecha Periodo</label>
                                	 <div class="form-group">
                                	 	<input type="date" name="fecha_hoy" >
									</div>	

									<input type="hidden" name="importe_tributo" value="">
									
									<div class="form-group">

									<input type="submit" name="envio" class="btn btn-primary " value="Generar Modelo" >
								
			
									<a href="{{ route('intims')}}" class="btn btn-success">+1</a>

									<input type="submit" name="envio" class="btn btn-primary " value="+++1" >


									<a href="{{ route('intimsss',[544]) }}" class="btn btn-success" action=>+1</a>


									<a href="{{ route('lista_modelos') }}" class="btn btn-primary" >Listar Modelos Creados</a>



									</div>
						

								</div>
 
                              </div>


                      </div>




@if(isset($cuits))	

{{ $cuits }}						

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
		
    </tbody>
  </table>

@endif

                 </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"></script>

<script type="text/javascript">
	
function autocompletar() {


	var min_length = 11; // variable length
	var cuit = $('#cuit').val();//obtener el nombre y/o termino de busqeuda
	$('#matricula').empty();
	if (cuit.length >= min_length) {
		$.ajax({

			
			url: "{{ route('cuit_ruta')}}",
			data: "cuit="+cuit+"&_token={{ csrf_token()}}",
			dataType: "json",
			method: "POST",
			success:function(data){
				$.each(data, function(i, item) {
				//alert(data[i].pad_ente);
				//$('#lista').append(data[i].pad_ente);
				
				//20069524959

				  $('#matricula')
		         .append($("<option></option>")
		         .attr("value",data[i].pad_nomenclatura)
		         .text(data[i].pad_nomenclatura));

/*
				$('#lista').show();//mistrar la lista
				$('#lista').html(data[i].pad_ente);//mostrar resultado de consulta en la lista
			
*/
				});


				
			}

		});
	} else {
		$('#lista').hide();
	}
}





</script>

@endsection

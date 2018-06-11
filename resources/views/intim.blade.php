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
		                                    <select class="form-control" name="modeloform" id="modeloform"  onclick="controlarmod()" >
		                                    <option value="1">Modelo 1</option>
		                                    <option value="2">Modelo 2</option>    
		                                    <option value="3">Modelo 3</option>   
		                                    </select>
	                                		</div>

									
									<input type="hidden" name="auxmodel" id="auxmodel" value="">

 									<input class="form-control" type="hidden" name="id" id="id" ><!--campo que recibirá el id-->

									<label class="form-group">Cuit</label>
									<div class="form-group">
										<input type="text" name="cuit" id="cuit" placeholder="cuit_contribuyente" maxlength="11" onkeyup="autocompletar()">
									</div>
									<ul id="lista" ></ul>

									<input type="hidden" name="auxcuit" id="auxcuit" value="">

				
									<label class="form-group">Matricula</label>
									<div class="form-group">
										<select name="matricula" id="matricula" >
											
										
										</select>
									</div>
									
									<label class="form-group">Tributo</label>
									<div class="form-group">
										<input type="text" name="tributo" id="tributo" placeholder="tributo" maxlength="4" style="display:"";">
									</div>
									
									
									<div id="importe" style="display: none;">
										

									<label>Importe</label>	<br>

								$<input type="text" name="import" id="import"  maxlength="7" ><br><br>






									</div>


									<input type="hidden" name="fecha_creac" value="{{  date('Y-m-d') }}">


									<label class="form-group">Fecha Periodo</label>
                                	 <div class="form-group">
                                	 	<input type="date" name="fecha_hoy" id="fecha_hoy" >
									</div>	
									


									<input type="hidden" name="importe_tributo" value="">
									
									<div class="form-group">

									<input type="submit" name="envio" class="btn btn-primary " value="Generar Modelo" >
								
			
								


									<a  class="btn btn-success" onclick="masuno()">+1</a>


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
	if (cuit.length >= min_length) {
		$.ajax({

			
			url: "{{ route('cuit_ruta')}}",
			data: "cuit="+cuit+"&_token={{ csrf_token()}}",
			dataType: "json",
			method: "POST",
			success:function(data){

					 document.getElementById('auxcuit').value = $('#cuit').val();


					$('#matricula').empty();


				$.each(data, function(i, item) {
			
				

				  $('#matricula')
		         .append($("<option></option>")
		         .attr("value",data[i].pad_nomenclatura)
		         .text(data[i].pad_nomenclatura));

				});}


				
			

		});
	} else {
		$('#lista').hide();
	}
}





</script>

<script type="text/javascript">
	


function controlarmod()
{

	div21=document.getElementById('modeloform').value;

	document.getElementById('auxmodel').value = div21;


	if (div21==2) {

		 div2=document.getElementById('importe');
    	 div2.style.display = '';

	}

	else

	{
		div2=document.getElementById('importe');
    	 div2.style.display = 'none';
	}
		
	

}




</script>


<script type="text/javascript">
	

function masuno()


{


	//div1=document.getElementById('modeloform');



	document.getElementById('modeloform').disabled = true;


	$('#cuit').attr("disabled", true);

	var cuit = $('#auxcuit').val();

	var modelofo = $('#auxmodel').val();

	var matricula = $('#matricula').val();

	var tributo = $('#tributo').val();

	var importe = $('#import').val();

	var fecha = $('#fecha_hoy').val();

	$.ajax({

			
			url: "{{ route('agregar_tribut')}}",
		//	data: "cuit="+cuit+"&_token={{-- csrf_token()--}}",


			data: "cuit="+cuit+"&_modelofo="+modelofo+"&_matricula="+matricula+"&_tributo="+tributo+"&_importe="+importe+"&_fecha="+fecha+"&_token={{ csrf_token()}}",


			dataType: "json",
			method: "POST",
			success:function(data){

					// document.getElementById('auxcuit').value = $('#cuit').val();


		document.getElementById('tributo').value = data;

						}


				
			

		});














	//div1.style.display = 'none';





}



</script>


@endsection

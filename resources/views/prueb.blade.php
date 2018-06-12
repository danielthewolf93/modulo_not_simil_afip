@extends('layouts.app')


@section('content')				
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Prueba</div>

				 <form method="post" action="{{ route('prueb_agreg')}}" >
                    {{ csrf_field() }}


								<div class="panel-body">
											
											@if(isset($id_tabla))
											ID:{{ $id_tabla }}<br>
											
											<input type="hidden" name="id_m" value="{{ $id_tabla }}">

											@endif
											
											@if(isset($model))
											
											<br>Modelo de Intimacion:{{ $model }}

											<input type="hidden" name="mod_det" value="{{ $model }}">

											@endif


											<div class="form-group">
	 									    <label class="form-group">Modelo de Intimacion</label>
		                                    <select class="form-control" name="modeloform" id="modeloform"  onclick="controlarmod()" >
		                                    <option value="1">Modelo 1</option>
		                                    <option value="2">Modelo 2</option>    
		                                    <option value="3">Modelo 3</option>   
		                                    </select>
	                                		</div>


											
											
											<p><strong> Cuit :</strong></p>

											@if(isset($cuitcon))
											
											<br>Cuit:{{ $cuitcon }}
											
											<input type="hidden" name="cuit_m_det" value="{{ $cuitcon }}">

											@endif

											<div class="form-group">
											<input type="text" name="cuit" id="cuit" placeholder="cuit_contribuyente" maxlength="11" onkeyup="autocompletar()">
											</div>
	

									<label class="form-group">Matricula</label>
									<div class="form-group">
										<select name="matricula">
											
											<option value="1">Matricula1</option>
											<option value="2">Matricula2</option>
											<option value="3">Matricula3</option>
										</select>
									</div>
									
									<label class="form-group">Tributo</label>
									<div class="form-group">
										<input type="text" name="tributo" id="tributo" placeholder="tributo" maxlength="4" required>
									</div>


									<label class="form-group">Fecha Periodo</label>
                                	 <div class="form-group">
                                	 	<input type="date" name="fecha_hoy" >
									</div>	
									
									<div class="form-group">

									<input type="submit" name="envio" class="btn btn-primary " value="Agregar Tributo" >
								
			
	
									<input type="hidden" name="fecha_creac" value="{{  date('Y-m-d') }}">

									<input type="hidden" name="importe_tributo" value="">


									<div id="importe" style="display: none;">
										

									<label>Importe</label>	<br>

								$<input type="text" name="import" id="import"  maxlength="7" ><br><br>






									</div>





									</div>
						

								</div>
 
                              </div>


                      </div>


@if(isset($modeloIntDet))
 
 <div class="contener">

 <table class="table" id="most" >

    <thead>

      <tr>
		
        <th>Inscripc/Matricula</th>
        <th>Periodo</th>
        <th>Tributo</th>
        <th>Monto</th>
        <th></th>
        
      </tr>
	  
	@foreach ($modeloIntDet as $mod_det)

	<tr> 
	    <th>{{ $mod_det->matricula_inscripcion }}</th>
	    <th>{{ $mod_det->periodo }}</th>
	    <th>{{ $mod_det->tributo }}</th>
	    <th>{{ $mod_det->importe }}</th>
	    <th><a href="" class="btn btn-danger" >X</a></th>
    </tr>

	@endforeach



    </thead>
    <tbody>
		
    </tbody>
  </table>

</div>




                 </form>
            </div>
        </div>
    </div>
</div>


@endif



                 </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	


function controlarmod()
{

	div21=document.getElementById('modeloform').value;

	


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


@endsection

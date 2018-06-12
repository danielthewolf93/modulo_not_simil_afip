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
											
											
											
											<p><strong> Modelo Elegido : </strong> {{ $mode }}</p>
											
											<p><strong> Cuit :</strong>{{ $cuitt }}</p>
<br>	ID:{{ $id_tablass }}

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
										<input type="text" name="tributo" id="tributo" placeholder="tributo" maxlength="4">
									</div>


									<label class="form-group">Fecha Periodo</label>
                                	 <div class="form-group">
                                	 	<input type="date" name="fecha_hoy" >
									</div>	
									
									<div class="form-group">

									<input type="submit" name="envio" class="btn btn-primary " value="Generar Modelo" >
								
			
									<a href="{{ route('intims')}}" class="btn btn-success">+1</a>

									<a href="{{ route('lista_modelos') }}" class="btn btn-primary" >Listar Modelos Creados</a>



									</div>
						

								</div>
 
                              </div>


                      </div>


 <div class="contener">






                 </form>
            </div>
        </div>
    </div>
</div>
@endsection

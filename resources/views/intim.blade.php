@extends('layouts.app')


@section('content')				
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generador</div>

				 <form method="POST" action="{{ route('messages.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

								<div class="panel-body">
 								   <div class="form-group">
 									    <label class="form-group">Modelo de Intimacion</label>
	                                    <select class="form-control" name="modeloform">
	                                    <option value="0">Seleccionar Modelo</option> 
	                                    <option value="1">Modelo 1</option>
	                                    <option value="2">Modelo 2</option>    
	                                    <option value="3">Modelo 3</option>
	                                    </select>
                                	 </div>
									
									<label class="form-group">Cuit</label>
									<div class="form-group">
										<input type="text" name="cuit" placeholder="cuit_contribuyente">
									</div>
									<label class="form-group">Matricula</label>
									<div class="form-group">
										<select>
											<option value="0">Seleccionar</option>
											<option value="1">Matricula1</option>
											<option value="2">Matricula2</option>
											<option value="3">Matricula3</option>
										</select>
									</div>

									<label class="form-group">Fecha</label>
                                	 <div class="form-group">
                                	 	<input type="date" name="fecha_hoy" >
									</div>
									


                           		 

                                <div class="form-group">
                                <a href="{{ route('model1') }}" class="btn btn-primary ">Generar Modelo</a>
                                </div>

                              </div>


                      </div>

                 </form>
            </div>
        </div>
    </div>
</div>
@endsection

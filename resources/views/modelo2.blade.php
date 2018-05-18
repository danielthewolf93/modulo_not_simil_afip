	@extends('layouts.app')
	@section('content')
	<h1>Modelo 2</h1>
		 <div class="form-group">

	

	<div class="contener">
		
	<label for="">Cuit</label>
	  {{ $cuit }}
	<br>
	<label for="">Matricula</label>
	{{ $matricula }}
	<br>
	<label for="">Fecha</label>
	{{ $fecha }}

	</div>


     <a href="#" class="btn btn-primary ">Enviar</a>
  
     
     <a href="#" class="btn btn-primary ">Guardar</a>
		
	 <a href="{{ route('intim') }}" class="btn btn-primary ">Cancelar</a>
	


     </div>
	@endsection

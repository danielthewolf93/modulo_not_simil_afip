	@extends('layouts.app')
	@section('content')
	<h1>Modelo 3</h1>
	<div class="form-group">

	

	<div class="contener">
	
			<label for="">Fecha Hoy:</label>
			 {{ date('Y-m-d') }}
			 <br>
			<label for="">Id Usuario:</label>
			{{ Auth::user()->name }}
			<br>
			<label for="">Cuit:</label>
			  {{ $cuit }}
			<br>
			<label for="">Matricula:</label>
			{{ $matricula }}
			<br>
			<label for="">Fecha:</label>
			{{ $fecha }}
			<br>
			<textarea name="texto1" placeholder="Texto 1"></textarea> 
			<br><br>
			<textarea name="texto2" placeholder="Texto 2"></textarea> 
			<br><br>
			<textarea name="texto3" placeholder="Texto 3"></textarea> 
	<br>

	</div>
	<br>



     <a href="#" class="btn btn-primary ">Enviar</a>
  
     
     <a href="#" class="btn btn-primary ">Guardar</a>
		
	 <a href="{{ route('intim') }}" class="btn btn-primary ">Cancelar</a>
	


     </div>
	@endsection

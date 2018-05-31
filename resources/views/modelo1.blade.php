	@extends('layouts.app')
	@section('content')
	<h1>Modelo 1</h1>
	
	 <div class="form-group">

	

<div class="contener">
	


		

			<label for="">Fecha Hoy:</label>
			 {{ date('Y-m-d') }}
				
			<input type="hidden" name="model_fecha_creac" value="{{  date('Y-m-d') }}">


			 <br>
			<label for="">Id Usuario:</label>
			{{ Auth::user()->name }}
			<br>
			<input type="hidden" name="model_user" value="{{Auth::user()->name}}">

			<label for="">Cuit:</label>
			  {{ $cuit }}
			<input type="hidden" name="model_cuit_cont" value="{{ $cuit }}">

			<br>
			<label for="">Matricula:</label>
			{{ $matricula }}

			<input type="hidden" name="model_cuit_matr" value="{{  $matricula }}">

			
			<br>
			<label for="">Tributo:</label>
			{{ $tributo }}

			<input type="hidden" name="model_tributo" value="{{  $tributo }}">




			<br>
			<label for="">Fecha:</label>
			{{ $fecha }}

			<br>
			
			

			<label for="">Periodo:{{ $periodo }}</label>


			<input type="hidden" name="model_fecha_eleg" value="{{  $fecha }}">


			<br>
			<br>
			<textarea name="texto1" placeholder="Texto 1"></textarea> 
			<br><br>
			<textarea name="texto2" placeholder="Texto 2"></textarea> 
			<br><br>
			<textarea name="texto3" placeholder="Texto 3"></textarea> 

			<input type="hidden" name="texto4">

			<input type="hidden" name="texto5">

			<input type="hidden" name="importe">


	<br>

	</div>
	<br>


     <a href="#" class="btn btn-primary ">Enviar</a>
  
     
     <a href="#" class="btn btn-primary ">Guardar</a>
		
	 <a href="{{ route('intim') }}" class="btn btn-primary ">Cancelar</a>
	


     </div>
	@endsection

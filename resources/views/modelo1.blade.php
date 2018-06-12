	@extends('layouts.app')
	@section('content')
	
	
	
	 <div class="form-group">

	

<div class="contener">

	 <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">	
	<h1 style="position: center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Modelo {{ $mode }}</h1>
	
			<form action="{{ route('save_model') }}"  method="POST"  > 
				{{ csrf_field() }}


			<input type="hidden" name="model_mode" value="{{  $mode }}">

			<label for="">Fecha Hoy:</label>
			 {{ date('Y-m-d') }}
				
			<input type="hidden" name="model_fecha_creac" value="{{  date('Y-m-d') }}">

	
			 <br>
			<label for="">Id Usuario:</label>
			{{ Auth::user()->name }}
			<br>
			<input type="hidden" name="model_user" value="{{Auth::user()->id}}">

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
			<input type="hidden" name="model_fecha_eleg" value="{{  $fecha }}">
			<br>
			
			

			<label for="">Periodo:</label>{{ $periodo }}


			<input type="hidden" name="model_periodo" value="{{  $periodo }}">
		
			<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

			


			<br>
			
			 <div class="form-group">
			<textarea name="texto1" placeholder="Texto 1" class="form-control" ></textarea> 
			</div>
			 <div class="form-group">
			<textarea name="texto2" placeholder="Texto 2" class="form-control" ></textarea> 
			</div>
			 <div class="form-group">
			<textarea name="texto3" placeholder="Texto 3" class="form-control" ></textarea> 
			</div>

			<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		
			<input type="hidden" name="texto4" value="">

			<input type="hidden" name="texto5" value="">

			<input type="hidden" name="importe" value="">
	
	<input type="hidden" name="model_tip" value="{{ $mode }}">

	<br>

	</div>
	<br>


     <a href="#" class="btn btn-primary ">Enviar</a>
  	
  	<button type="submit" class="btn btn-success">Guardar 2</button>
     
     <a href="{{ route('save_model') }}" class="btn btn-primary ">Guardar</a>
		
	 <a href="{{ route('intim') }}" class="btn btn-primary ">Cancelar</a>
	

</form>

     </div>

</div>
</div>
</div>

	@endsection

	@extends('layouts.app')
	@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">	



		<h1 style="position: center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Modelo {{ $mode }}</h1>

		<form action="{{ route('save_model') }}"  method="POST"  > 
			{{ csrf_field() }}

		<label for="">Fecha :</label>
			 {{ date('d-m-Y') }}
			<br>
			<label for="">Cuit:</label>
			  {{ $cuit }}
	

			<input type="hidden" name="model_cuit_cont" value="{{ $cuit }}">

							<input type="hidden" name="model_fecha_creac" value="{{  date('Y-m-d') }}">

										<input type="hidden" name="model_user" value="{{Auth::user()->id}}">





		 <div class="form-group">

	
		<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

	<div class="contener">
	


			<h3>Detalle</h3>
			

			

				<table class="table">
    <thead>
      <tr>
        
      	<th>Inscripc/Matricula</th>
      	<th>Periodo</th>
      	<th>Tributo</th>
      	<th>Monto</th>
      	

        
   

        
      </tr>


	<tr>
		
			
		<th>{{ $matricula }}</th>
		<input type="hidden" name="model_cuit_matr" value="{{  $matricula }}">

		<th>{{ $periodo }} </th>
		<input type="hidden" name="model_periodo" value="{{  $periodo }}">

		<th>{{ $tributo }}</th>
		<input type="hidden" name="model_tributo" value="{{  $tributo }}">

		<th>${{ $importes }}</th>

		<input type="hidden" name="importe" value="{{ $importes }}">

		<input type="hidden" name="model_tip" value="{{ $mode }}">

		<input type="hidden" name="model_fecha_eleg" value="{{  $fecha }}">

		<input type="hidden" name="model_periodo" value="{{  $periodo }}">

		<input type="hidden" name="texto1" >

		<input type="hidden" name="texto2" >

		<input type="hidden" name="texto3" >

		<input type="hidden" name="texto4" >

		<input type="hidden" name="texto5" >

		<input type="hidden" name="model_mode" value="{{  $mode }}">



	</tr>

	



    </thead>
    	<tbody>

		</tbody>
  	</table>
			
			<p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

		<br>

						<p>----------------</p>
			
			<br>




			<a href="#" class="btn btn-primary ">Enviar</a>
  
     	  	<button type="submit" class="btn btn-success">Guardar 2</button>



     <a href="#" class="btn btn-primary ">Guardar</a>
		
	 <a href="{{ route('intim') }}" class="btn btn-primary ">Cancelar</a>
	

	</div>
</div>
</div>
</div>
	


     


     </div>
	@endsection

	@extends('layouts.app')
	@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">	



		<h1 style="position: center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Modelo {{ $mode }}</h1>
		<label for="">Fecha :</label>
			 {{ date('d-m-Y') }}
			<br>
			<label for="">Cuit:</label>
			  {{ $cuit }}

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
      	

        
        <th></th>

        
      </tr>


	<tr>
		
			
		<th>000000065544</th>
		<th>05/2018 </th>
		<th>5512</th>
		<th>$771</th>
		

	</tr>

	<tr>
		
			
		<th>000000063333</th>
		<th>06/2018 </th>
		<th>5512</th>
		<th>$8768</th>
		

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
  
     
     <a href="#" class="btn btn-primary ">Guardar</a>
		
	 <a href="{{ route('intim') }}" class="btn btn-primary ">Cancelar</a>
	

	</div>
</div>
</div>
</div>
	


     


     </div>
	@endsection

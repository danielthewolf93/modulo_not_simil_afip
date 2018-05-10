	@extends('layouts.app')
	@section('content')
	<h1>Modelo 1</h1>
	<p>Texto</p>
	 <div class="form-group">
     <a href="#" class="btn btn-primary ">Enviar</a>
    
     
     <a href="#" class="btn btn-primary ">Guardar</a>
		
	 <a href="{{ route('home') }}" class="btn btn-primary ">Cancelar</a>

     </div>
	@endsection

@extends('layouts.app')

@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="../../public/js/busqueda_calles.js"></script>


<div class="container">

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar archivos</div>
        <div class="panel-body">
          <form method="POST" action="http://localhost:8000/prueba3/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
            
<!--  
            <form method="POST" action="http://diamond-chaos.codio.io:3000/tuto/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">

-->

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>
            
          

            
           

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('borrar_arch') }}" class="btn btn-primary">Borrar</a>
              </div>
            </div>
          </form>

     
        
        
        <div class="form-group">
              <form  method="GET">
              <label class="col-md-4 control-label">Buscar Contribuyente</label>
               <div class="col-md-6">
              <input type="number" name="term" id="q" onkeyup="autocompletar()" autocomplete="off" class="form-control">
              <button type="submit" class="btn btn-primary">Buscar
              </div>

        </div>

         

        </button>
        </form>
        <input type="hidden" name="source_id" class="source_id" id="id" placeholder="22">
        
        <ul id="lista"></ul>
                  <div id="e_nombre" style="color:red;"></div>
                  <input type="hidden" id="e2_nombre" value="prueba">
            
    


        </div>
      </div>
    </div>
  </div>
</div>

@endsection
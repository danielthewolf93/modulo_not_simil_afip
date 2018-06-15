@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar Mensaje</div>




                @if (Session::has('message'))
                   <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif





                <form method="POST" action="{{ route('messages.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                            <div class="panel-body">

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                   
                                   <select class="form-control" name="recipient_id">
                                       
                                       <option value="0">Selecciona el usuario</option>
                                       <option value="99999999">Enviar a todos</option>
                                       <?php foreach ($users as $user ): ?>

                                        <option value="{{$user->id }}">{{$user->name}} </option>
                                           
                                       <?php endforeach ?>
                                    
                                   </select> 

                                </div>


                               

                                <div class="form-group">
                                    
                                    <label for="tema_not">Motivo del Mensaje</label>
                                    <input type="text" name="tema_not" class="form-control" placeholder="Ingrese motivo">


                                </div>
                
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Ingrese aqui tu mensaje" name="body"></textarea>
                                </div>

                                
                                <div class="form-group">
                                    
                                    <label for="tipo_not">Prioridad</label>
                                    <select class="form-control" name="tipo_not"> 
                                    
                                        <option value="bajo">Baja</option>
                                        <option value="normal">Normal</option>
                                        <option value="importante">Alta</option>

                                    
                                    </select>


                                </div>


                                 <div class="form-group">
                                    
                                    <label for="tipo_desp">Despacho</label>
                                    <select class="form-control" name="tipo_desp"> 
                                    
                                        <option value="Cobranza Rentas SFC">Cobranza Rentas SFC</option>
                                        <option value="Administracion Rentas SFC">Administracion Rentas SFC</option>
                                        <option value="Sistemas Rentas SFC">Sistemas Rentas SFC</option>

                                    
                                    </select>


                                </div>

                                


                                <!--
                                <label for="adjunto">Adjuntar</label>
                                <div class="form-group">
                                <input type="file" name="adjunto" class="form-control"/>
                                </div>
                            -->

                                
                                <div class="form-group">
                                <button class="btn btn-primary " class="form-control" >Enviar</button>
                                </div>

                            </div>

                 </form>
            </div>
        </div>
    </div>
</div>

                 <div class="container">
                    <div class="row">
                       <div class="col-md-8 col-md-offset-2">
                           <div class="panel panel-default">
                                <div class="panel-heading">Enviar Novedad</div>
                                    <div class="panel-body">


                                 <form method="POST" action="{{ route('novedades.store')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                 

                                

                                     <div class="form-group">
                                    
                                            <label for="tipo_desp">Tema</label>
                                            <select class="form-control" name="tipo_tema"> 
                                            
                                                <option value="Nuevos">Nuevos</option>
                                                <option value="Cambios">Cambios</option>
                                                <option value="Bajas">Bajas</option>

                                            
                                            </select>
                                    </div>





                                         <div class="form-group">
                                            <textarea class="form-control" placeholder="Ingrese aqui tu mensaje" name="body"></textarea>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="tipo_desp">Fecha Hasta</label>
                                    
                                            <input type="date" name="fecha_hasta" id="fecha_hasta">
                                        </div>

                                    
                                        <div class="form-group">
                                            <button class="btn btn-primary " class="form-control" >Enviar</button>
                                        </div>


                                 </form>

                            </div>
                        </div>
                    </div>
                </div>
           </div>


<script type="text/javascript">
    
function autocompletar() {


    var min_length = 1; // variable length
    var cuit = $('#buscaruse').val();//obtener el nombre y/o termino de busqeuda
    if (cuit.length >= min_length) {
        $.ajax({

            
            url: "{{ route('cuit_ruta')}}",
            data: "cuit="+cuit+"&_token={{ csrf_token()}}",
            dataType: "json",
            method: "POST",
            success:function(data){

                     document.getElementById('auxcuit').value = $('#cuit').val();


                    $('#matricula').empty();


              
            
                

                  $('#matricula')
                 .append($("<option></option>")
                 .attr("value",data[i].pad_nomenclatura)
                 .text(data[i].pad_nomenclatura));

             }


                
            

        });
    } else {
        $('#lista').hide();
    }
}





</script>




</script>


@endsection

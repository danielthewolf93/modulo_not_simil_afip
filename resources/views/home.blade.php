@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar mensaje</div>

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

                                


                                
                                <label for="adjunto">Adjuntar</label>
                                <div class="form-group">
                                <input type="file" name="adjunto" class="form-control"/>
                                </div>


                                <div class="form-group">
                                <button class="btn btn-primary " class="form-control" >Enviar</button>
                                </div>

                            </div>

                 </form>
            </div>
        </div>
    </div>
</div>


@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar mensaje</div>

                <form method="POST" action="{{ route('messages.store')}}">
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
                                    <input type="text" class="form-control" name="busqueda" placeholder="Buscar usuario">
                                </div>


                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Ingrese aqui tu mensaje" name="body"></textarea>
                                </div>

                                <div class="form-group">
                                <a href="#" class="btn btn-primary btn-block">Generar Correo</a>
                                </div>
                                
                                <label for="adjunto">Adjuntar</label>
                                <div class="form-group">
                                <input type="file" name="adjunto" class="form-control"/>
                                </div>


                                <div class="form-group">
                                <button class="btn btn-primary btn-block" >Enviar</button>
                                </div>


                            </div>

                 </form>
            </div>
        </div>
    </div>
</div>


@endsection

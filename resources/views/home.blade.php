@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar mensaje</div>

                <form method="POST" action="{{ route('messages.store')}}" >
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
                                    <textarea class="form-control" placeholder="Ingrese aqui tu mensaje" name="body"></textarea>
                                </div>

                                
                                
                                <label for="adjunto">Adjuntar</label>
                                <div class="form-group">
                                <input type="file" name="adjunto" class="form-control"/>
                                </div>


                                <div class="form-group">
                                <button class="btn btn-primary " class="form-control" >Enviar</button>
                                </div>

                                 <fieldset >Seccion 2

                                <div class="form-group" >
                                    <select class="form-control" name="modeloform">
                                    <option value="0">Seleccionar Modelo</option> 
                                    <option value="1">Modelo 1</option>
                                    <option value="2">Modelo 2</option>    
                                    <option value="3">Modelo 3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <a href="{{ route('model1') }}" class="btn btn-primary ">Generar Modelo</a>
                                </div>

                                </fieldset>
                            </div>

                 </form>
            </div>
        </div>
    </div>
</div>


@endsection

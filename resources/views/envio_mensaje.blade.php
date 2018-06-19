<!DOCTYPE html>
<html>
<head>
	<title>Enviar mensaje</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>



</head>
<body>
    {{  $request->session()->flash('status', 'Task was successful!'); }}

	             <form method="POST" action="{{ route('home')}}" class="form-control" enctype="multipart/form-data" onsubmit="return validacions()">
                    {{ csrf_field() }}
                            <div class="panel-body">


                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif


                                <div class="form-group">
                                    
                                   <select class="form-control" name="recipient_id">
                                       
                                       <option  value=""  >Selecciona el usuario</option>
                                       <<?php foreach ($users as $user ): ?>

                                        <option value="{{$user->id }}">{{$user->name}} </option>
                                           
                                       <?php endforeach ?>
                                   </select> 

                                </div>


                                <div class="form-group">
                                  

                                  <input type="text" name="buscaruse" id="buscaruse">





                                </div>

                               

                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Ingrese aqui tu mensaje" name="body"></textarea>
                                </div>
                                <div class="form-group">
                                <button class="btn btn-primary btn-block" >Enviar</button>
                                </div>


                            </div>

                 </form>



</body>
</html>
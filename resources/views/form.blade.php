<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <link href="/css/app.css" rel="stylesheet">
 <style>
 body {
                margin-top: 80px;
            }
 </style>
 <title>Formulario</title>
</head>
<body>
    <div class="container">
 <div class=" row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Formulario</div>
              <div class="panel-body">
 @include('messages')
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('formus') }}">
                      {{ csrf_field() }}
 
                         <div class="form-group">
                             <label for="student" class="col-md-4 control-label">Estudiante</label>
 
                             <div class="col-md-6">
                                 <input id="student" type="text" class="form-control" name="student" value="{{ old('student') }}">
                             </div>
                         </div>
 
                         <div class="form-group">
                             <label for="score" class="col-md-4 control-label">Puntuación</label>
 
                             <div class="col-md-6">
                                 <input id="score" class="form-control" name="score" value="{{ old('score') }}" >
                             </div>
                         </div>
 
                         <div class="form-group">
                             <div class="col-md-6 col-md-offset-4">
                                 <button type="submit" class="btn btn-primary">
                                     Enviar
                                 </button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
   </body>
</html>
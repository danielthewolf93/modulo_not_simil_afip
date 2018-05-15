<!DOCTYPE html>
<html>
<head>
	<title>Enviar mensaje</title>

<script type="text/javascript">
  $(function()
{
     $( "#q" ).autocomplete({
      source: "search/autocomplete",
      minLength: 3,
      select: function(event, ui) {
        $('#q').val(ui.item.value);
      }
    });
});
</script>

</head>
<body>


	             <form method="POST" action="{{ route('home')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                            <div class="panel-body">


                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif


                                <div class="form-group">
                                    
                                   <select class="form-control" name="recipient_id">
                                       
                                       <option value="">Selecciona el usuario</option>
                                       <<?php foreach ($users as $user ): ?>

                                        <option value="{{$user->id }}">{{$user->name}} </option>
                                           
                                       <?php endforeach ?>
                                   </select> 

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

<!DOCTYPE html>
<html>
<head>
	<title>Titulo</title>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
	<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
    
   <link   href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js">  
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
  



</head>
<body>




<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
         <tr>
            <th>Id</th>
            <th>Cuit</th>
            <th>Descripcion</th>
            <th>Fecha </th>
        </tr>
    </thead>
</table>


<a href="/pruebaloca" >Redireccionar</a>

<button onclick="prueb()">Prueba</button>

<a href="{{route('toast')}}">Probar con Controller</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="js/qrcode.min.js"></script>


        <script >
        	
        	function prueb() {
        		toastr.options.progressBar = true;

        		toastr.info('Nueva Novedad','{{ Auth::user()->name }}',{timeout: 5000})

        	}
       </script>


<script>
    
$(document).ready( function () {
  var oTable =    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('tabla_notif') }}",
        "columns": [
                {data: 'id_mov_contr', name: 'id_mov_contr'},
                {data: 'cuit', name: 'cuit'},
                {data: 'mov_descripcion', name: 'mov_descripcion'},
                {data: 'created_at', name: 'created_at'}
            ]
       
    } );
   
} );

</script>


@include('notificaciones.session_msj')



<div class="col-md-5 col-xs-12">
                        <div class="row titulo-general">
                            <legend >&nbsp&nbsp&nbsp&nbspCode QR</legend>
                        </div>
                        <fieldset class="col-md-7 col-xs-9" style="text-align: center !important; left: 120px !important;">
                            <div class="table-responsive res-table">
                                <table class="table table-vcenter table-condensed table-bordered table-striped">
                                    <div class="border-fieldset">
                                        <div class="container" style="padding: 15px !important; margin-top: auto !important; top: 30% !important;">
                                            <div class="codigoqr" id="qrcode" >
                                            </div>
                                        </div>
                                    </div>
                                </table>
                            </div>
                        </fieldset>
                    </div>

<script type="text/javascript">
   $(function(){
            new QRCode("qrcode", {
                text: "http://docs.google.com/gview?url=http://es.tldp.org/COMO-INSFLUG/es/pdf/Linuxdoc-Ejemplo.pdf&embedded=true",
                width: 150,
                height: 150
            });
        });

</script>



{{--<?php--}}
    //Agregamos la libreria para genera códigos QR
    require "phpqrcode/qrlib.php";    
    
    //Declaramos una carpeta temporal para guardar la imagenes generadas
    $dir = 'temp/';
    
    //Si no existe la carpeta la creamos
    if (!file_exists($dir))
        mkdir($dir);
    
        //Declaramos la ruta y nombre del archivo a generar
    $filename = $dir.'test.png';
 
        //Parametros de Condiguración
    
    $tamaño = 10; //Tamaño de Pixel
    $level = 'L'; //Precisión Baja
    $framSize = 3; //Tamaño en blanco
    $contenido = "http://codigosdeprogramacion.com"; //Texto
    
        //Enviamos los parametros a la Función para generar código QR 
    QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
    
        //Mostramos la imagen generada
    echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
?>

    --}}


</body>

</html>
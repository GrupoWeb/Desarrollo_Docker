<body>
	<form action="#" method="POST" enctype="multipart/form-data" name="form1" style = " pisition: relative;  width:80%;  display: inline-block;">
			<div class="container" >
  				<h2>Solicitudes para confirmar</h2>
			<table id="Contenido_Solicitud" class="table" >
			</table>
			</div>
		</form>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}

.container table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 10px; width: 100%; text-align: center;    border-collapse: collapse; }

.container th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

.container td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

.container tr:hover td { background: #d0dafd; color: #339; }



#main-header {
    background: white;
    top: 0;
    position: fixed;
	z-index: 1;
}   
    #main-header a {
        color: white;
    }
    
   
   
   
   
#main-content {
    background: white;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
	 position: relative;
	 top:250px;
}

    #main-content header,
    #main-content .content {
        padding: 40px;
    }
    
	
#pie

{
width:auto;
height:12px;


font-size:15px;
font-family:"Segoe UI";
font-style:normal;
font-color:white;
border-top-color:black;
background:#0099FF


}


.Estilo8 {color: #FFFFFF}
.Estilo9 {font-size: 14px}
.Estilo10 {font-size: 16px}
</style>
	<script type='text/javascript' src="js/jquery.min.js"></script>
	<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="bootstrap/css/bootstrap.css" crossorigin="anonymous">
		<script>
			$.ajax({ 
				url: 'PHP/Carga_Solicitud_SPiloto.php',
        		data: {TipoSolicitud: '8'},
        		type: 'post',
				async: false,
        		success: function(data) {
                    $("#Contenido_Solicitud").append(data);
					$('#Contenido_Solicitud').DataTable({
        				"language": {
			            	"url": "js/Spanish.json"
        				}
					});
        		}
			});
			$(document).ready(function(){
				$("#Contenido_Solicitud").on("click", ".envia", function(){
					var str = this.id;
					var slr = this.getAttribute("name").split(" ").join("%20");
                    $("#cont").load("Comfirmar_Solicitud.php?Solicitud="+str+"&Solicitante="+slr);
				});
          	});
		</script>
</body>
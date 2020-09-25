<body>
	<form style = "position: relative;  width:80%;  display: inline-block;">
			<div class="container" style="width: 80%;">
  				<h2>Departamento</h2>
			<table id="Contenido_Solicitud">
			</table>
			<br> 
			</div>
			<!--Boton de agragar-->
			<div style = "pisition: relative; width:80%;  display: inline-block;">
				<label id = "Agraga_Contenido" class="Agregar"><i class="fa fa-plus-square" style="font-size:48px;color:hsl(120,60%,50%);">Agregar Departamento</i></label>
			</div>
		</form>
		
	<script type='text/javascript' src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
	
	tr{
		width : 2px;
	}

.container table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 10px;    width: 100%; text-align: center;    border-collapse: collapse; }

.container th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

.container td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

.container tr:hover td { background: #d0dafd; color: #339; }
.Agregar{
	cursor: pointer;
}
</style>
<script type='text/javascript' src="js/jquery.min.js"></script>
	<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
		<script>
			$.ajax({ url : 'PHP/MCarga_Departamento.php',
					data : { TipoSolicitud : '2'},
					type : 'post',
					async : false,
					success : function(data) {
						$('#Contenido_Solicitud').append(data);
						$('#Contenido_Solicitud').DataTable({
        				"language": {
			            	"url": "js/Spanish.json"
        				}
					});
					}
				});
			

			$(document).ready(function(){
				$("#Agraga_Contenido").click(function(){
                    $("#cont").load("Formulario_Ingreso_Departamento.php");
				});
          	});
		</script>
</body>
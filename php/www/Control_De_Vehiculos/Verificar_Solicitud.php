<body>
	<form action="" method="" enctype="multipart/form-data" name="form1" style = " pisition: relative;  width:80%;  display: inline-block;">
            <div class="container" >
  				<h2>Solicitudes de vehiculos para verificar</h2>
			<table id="Contenido_Solicitud"  >
			</table>
        </div>
		<div style="position: relative; margin-left:5%; display: inline-flex; width:40%; ">
			<table>
				<tr>
					<td>
						<i class='fa fa-car' style='font-size:20px;color: hsl(120, 60%, 50%);'></i>&nbsp;<label>Solicitud de Vehiculo con Piloto Asignado</label>
					</td>
				</tr>
				<tr>
					<td>
						<i class='fa fa-car' style='font-size:20px;color: hsl(0, 60%, 50%);'></i>&nbsp;<label>Solicitud de Vehiculo sin Piloto Asignado</label>
					</td>
				</tr>
			</table>
		</div>
    </form>
	<style>
.container table { font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 10px;    width: 100%; text-align: center;   border: 0.2px solid hsl(0, 1%, 100%);}

.container tr{ border: none;}

.container th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
    border: 0.5px solid hsl(0, 1%, 100%); color: #039; 
	border-left: none; border-right: none; }

.container td {    padding: 15px;     background: #e8edff;     border: 0.2px solid hsl(0, 1%, 100%);
    color: #669; border-left: none; border-right: none; }

.container tr:hover td { background: #d0dafd; color: #339; }


</style>
		<script type='text/javascript' src="js/jquery.min.js"></script>
	<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
        <script>
				$.ajax({ url: 'PHP/Carga_Solicitud_Verificacion.php',
					data: {},
         			type: 'POST',
					async: false,
         			success: function(data) {
                      $("#Contenido_Solicitud").append(data);
					  $("#Contenido_Solicitud").DataTable({
        				"language": {
			            	"url": "js/Spanish.json"
        				}
					});
                  }
				});
                //$("table").load("PHP/Carga_Solicitud_Pedida.php?TipoSolicitud=1");
                
                $(document).ready(function(){
                    $("#Contenido_Solicitud").on("click", ".envia", function(){
						var str = this.id;
						var slr = this.getAttribute("name").split(" ").join("%20");
                        $("#cont").load("Formulario_de_Verificacion.php?Solicitud="+str+"&Solicitante="+slr);
					});
                });
		</script>
		
</body>

<?php
	require('conexion/conexion.php');
	
	$sql = "
SELECT 
	[ftMonto_Vale] 
FROM
	[dbo].[tbVale] 
WHERE 
	bActivo = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	$MontoVales = 0;
	if($result)
	{
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			$MontoVales += $row['ftMonto_Vale'];
		}
	}
?>
<body>
	<form action="#" method="POST" enctype="multipart/form-data" name="form1" style = "  position: relative;  width:80%;  display: inline-block;">
		<!--<div align="center">
			<table id = "Letable" cellpadding="1px" align="center">
					<tr>
						<td colspan="7" align="acenter">
							<label>Filtos disponibles</label>
						</td>
					</tr>
					<tr>
						<td>
							<label>Vales Asignado</label><input type = "radio" name = "Asignacion" value = "0"/>
						</td>
						<td></td>
						<td>
							<label>Vales sin Asignar</label><input type = "radio" name = "Asignacion" value = "1"/>
						</td>
						<td></td>
						<td>
							<label>Asignado y sin Asignar</label><input type = "radio" 	name = "Asugnacion" checked /> 
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<label>Vales del mes de: </label>
						</td>
						<td>
							<select id = "LeInicio">
								<option value = "1">Enero</option>
								<option value = "2">Febrero</option>
								<option value = "3">Marzo</option>
								<option value = "4">Abril</option>
								<option value = "5">Mayo</option>
								<option value = "6">Junio</option>
								<option value = "7">Julio</option>
								<option value = "8">Agosto</option>
								<option value = "9">Septiembre</option>
								<option value = "10">Octubre</option>
								<option value = "11">Noviembre</option>
								<option value = "12">Diciembre</option>
							</select>
						</td>
						<td>&nbsp;</td>
						<td>
							<label>Hasta el mes de: </label>
						</td>
						<td>
							<select id = "LeInicio">
								<option value = "1">Enero</option>
								<option value = "2">Febrero</option>
								<option value = "3">Marzo</option>
								<option value = "4">Abril</option>
								<option value = "5">Mayo</option>
								<option value = "6">Junio</option>
								<option value = "7">Julio</option>
								<option value = "8">Agosto</option>
								<option value = "9">Septiembre</option>
								<option value = "10">Octubre</option>
								<option value = "11">Noviembre</option>
								<option value = "12">Diciembre</option>
							</select>
						</td>
						<td>
							<label>Todos los vales existentes</label><input type = "radio" name = "TodoMeses" checked />
						</td>
					</tr>
					<tr>
						<td>
							<label>Vales de Q.50</label><input type = "radio" name = "Monto" value = "50" />
						</td>
						<td></td>
						<td>
							<label>Vales de Q.100</label><input type = "radio" name = "Monto" value = "100" />
						</td>
						<td></td>
						<td>
							<label>Todos los montos</label><input type = "radio" name = "Monto" checked />
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="7" align="center">
							<label><input type = "button" value = "Buscar vales" /></label>
						</td>
					</tr>
				</table>-->
			<div class="container">
  				<h2>Vales de gasolina</h2>
				<br>
			<div class="container" >
			<table id="Contenido_Solicitud">
			</table>
			</div>
			<div id = "resultado">
				<br>
				<label>Monto total de los vales: </label>
				<input type = "text" value = " Q. <?php echo $MontoVales; ?>" readonly/>
			</div>
			<br> 
			</div>
			<div align="left" style = "position: relative; width:100%;  display: inline-block;">
				<label id = "Agraga_Contenido" ><i class="fa fa-plus-square" style="font-size:48px;color:hsl(120,60%,50%);"></i>&nbsp;Ingresar nuevos Vales de Combustible</label>
			</div>
		</form>
    <style>

	#Letable{
		font-size: 15px;
		margin-top: 3%;
		display: inline-table;
		border: 1px solid black;
		border-radius: 25px;
		padding: 5px;
	}
	
	/*#Letable td{
		border: 1px solid;
	}*/
	
	.container table {  
		font-size: 10px;    width: 100%; text-align: center;    border-collapse: collapse; }
	
	.container th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
		border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }
	
	.container td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
		color: #669;    border-top: 1px solid transparent; }
	
	.container tr:hover td { background: #d0dafd; color: #339; }
</style>
		<script type='text/javascript' src="js/jquery.min.js"></script>
		<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
	 	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	
		<script>
			$.ajax({ url: 'PHP/MCarga_Vales_Gasolina.php',
        		data: {TipoSolicitud: '2'},
        		type: 'post',
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
			

			$(document).ready(function(){
				$("#Agraga_Contenido").click(function(){
                    $("#cont").load("Formulario_Ingreso_Vale.php");
				});
				
				$("#Contenido_Solicitud").on("click", ".fa-spin",function(){
					alert("Opcion en contruccion");
				});
				
          	});
		</script>
</body>
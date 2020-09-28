<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="ISO-8859-1" />
<title>Imprecion de solicitud</title>
<style>


	#leTable{
		width: 100%;
		height: 100%;
		border: 1px solid;
		border-radius: 25px;
	
	}
/*	
	#leTable td{
		width: auto;

	}*/

	
	body{
		font-family: Arial, Helvetica, sans-serif;

	}

	.titulo{
		font-size: 16px;
		font-family: Helvetica;
		font-style: italic;
	}
	.texto{

	}
.contenedor{
	margin: 0 auto;
	padding: 0 auto;
	width: 70%;
	
}
	.table{
		width: 100%;
		margin: 0 auto;
		padding: 0 auto;
		text-align: center;
		height: 150px;
		border: 1px solid;
		

	}
.table2{
		width: 100%;
		margin: 0 auto;
		padding: 0 auto;
		height: 150px;
		border: 1px solid;
		height: 100%;
		

	}
img{
	width: 150px;
	height: 150px;
}
.img{
	width: 20%;
}
.tdTexto{
	width: 50%;
}
.tdResult{
	width: 25%;
}
</style>
</head>

<body>
	<div class="contenedor">
		<table class="table">
			<tr>
				<td class="img"><img src="images/logo.png" alt="" /></td>
				<td >
					<h3>SISTEMA DE SOLICITUD DE VEHICULOS PARA COMISION</h3>
					<h4>ME-G-ITR-AD-NVC-F01<br>MINISTERIO DE ECONOMIA</h4>
				</td>
				<td class="img"><img src="images/logomineco.png" alt="" /></td>
			</tr>
		</table>
		<table class="table2">
			<tr><br /></tr>
			<tr>
				<td>
					<label class="tdTexto" >FECHA SOLICITUD:</label>
				</td>
				<td>
					<label class="tdResult">_______________________________</label>
				</td>
				<td>
					<label class="tdTexto" >FECHA SOLICITUD:</label>
				</td>
				<td>
					<label class="tdResult" >_______________________________</label>
				</td>
			</tr>
			<tr>
				<td>
					<label class="tdTexto" >PERIODO SOLICITADO DEL:</label>
				</td>
				<td>
					<label class="tdResult">_______________________________</label>
				</td>
				<td>
					<label class="tdTexto" >AL:</label>
				</td>
				<td>
					<label class="tdResult">_______________________________</label>
				</td>
			</tr>
			<tr>
				<td>
					<label class="tdTexto" >SOLICITANTE:</label>
				</td>
				<td>
					<label class="tdResult">_______________________________</label>
				</td>
				<td>
					<label  class="tdTexto">DEPARTAMENTO:</label>
				</td>
				<td>
					<label class="tdResult">_______________________________</label>
				</td>
			</tr>
			<tr>
				<td >
					<label class="tdTexto">JEFE DEPARTAMENTO:</label>
				</td>
				<td colspan="5">
					<label class="tdResult">_____________________________________________________________________________________</label>
				</td>
			</tr>
			<tr>
				<td >
					<label class="tdTexto">LUGAR DE LA COMISION:</label>
				</td>
				<td colspan="5">
					<label class="tdResult">_____________________________________________________________________________________</label>
				</td>
			</tr>
			<tr>
				<td >
					<label class="tdTexto">JUSTIFICACIÓN:</label>
				</td>
				<td colspan="5">
					<label class="tdResult">_____________________________________________________________________________________</label>
				</td>
			</tr>
		</table>





<table cellspacing="9px 0" id = "leTable" >
	<tr>
		<td colspan="4" align="right">
		<label><?php date_default_timezone_set("America/Guatemala"); echo "Fecha de impresion: " . date("d-m-Y") . "<br>Hora de impresion: " . date("H:i:s"); ?></label>
		</td>
	</tr>
	<tr>
		<td colspan = "4" align="center" class="titulo">
			<label>SOLICITUD DE VEHICULO PARA COMISION</label>
			<br />
			<label>DIRECCION DE ATENCION Y ASISTENCIA AL CONSUMIDOR --DIACO--</label>
		</td>
	</tr>
	<tr>
		<td>
			<label>No. Comision: </label>
		</td>
		<td>
			<u><label><?php echo $row['idSolicitud_Vehiculo']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Fecha de la creacion de la Solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaSolicitud"><?php echo $row['dFecha_Solicitud']->format("d-m-Y"); ?></label></u>
		</td>
		
		<td> 
			<label>Hora de la creacion de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraSolicitud"><?php echo $row['hHora_Solicitud']->format("H:i"); ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Fecha de inicio de la solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaInicio"><?php echo $row['dFecha_Salida'] != NULL ? $row['dFecha_Salida']->format("d-m-Y") : "Solicitud sin fecha de salida"; ?></label></u>
		</td>
		
		<td>
			<label>Hora de inicio de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraInicio"><?php echo $row['hHora_Salida'] != NULL ? $row['hHora_Salida']->format("H:i") : "Solicitud sin hora de salida"; ?></label></u>
		</td>
	</tr>
		<tr>
		<td>
			<label>Fecha de finalizacion de la solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaInicio"><?php echo $row['dFecha_Regreso'] != NULL ? $row['dFecha_Regreso']->format("d-m-Y") : "Solicitud sin fecha de salida"; ?></label></u>
		</td>
		
		<td>
			<label>Hora de finalizacion de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraInicio"><?php echo $row['hHora_Regreso'] != NULL ? $row['hHora_Regreso']->format("H:i") : "Solicitud sin hora de salida"; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Solicitante: </label>
		</td>
		<td>
			<u><label id = "Solicitante"><?php echo $row['strSolicitante']; ?></label></u>
		</td>
		
		<td>
			<label>Depencencia: </label>
		</td>
		<td>
			<u><label id = "Dependencia"><?php echo $row['nombre_dependencia']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Director o Jefe Dependencia: </label>
		</td>
		<td>
			<u><label id = "JefeDependencia"><?php echo $row['strAprobador']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Lugar de comision: </label>
		</td>	
	</tr>
	<?php for($i = 0; $Direcciones[$i]; $i++){ ?>
	<tr >
		<td >
			<label>Departamento:     </label>
		</td>
		<td>
			<u ><label >  <?php echo $Direcciones[$i]['strDepartamento'] ?></label></u><br>
		</td>
		<td >
			<label>Municipio:     </label>
		</td>
		<td>
			<u ><label><?php echo $Direcciones[$i]['strMunicipio']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Direccion:     </label>
			</td>
		<td>
			<u ><label> <?php echo $Direcciones[$i]['strDireccion']; ?></label></u>
		</td>
	
	<?php }?>
	
		<td>
			<label>Justificacion: </label>
		</td>
		<td colspan="3">
			<u><label id = "Justificacion"><?php echo $row['strMotivo']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td ><label>Comision Menor o Local</label>
		</td>
		<td>
		<input type = "checkbox" id = "CMenor" <?php echo $row['idTipo_Comision'] == 1 ? "checked" : false; ?> readonly/>
		</td>
			
		<td ><label>Comision Mayor</label>
		</td>
		<td>
		<input type = "checkbox" id = "CMayor"  <?php echo $row['idTipo_Comision'] == 2 ? "checked" : false; ?> readonly/>
		</td>
	</tr>
	<tr>
		<td>
			<label>Piloto seleccionado para la comision: </label>
		</td>
		<td>
			<u><label><?php echo $row['strPiloto']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Vehiculo seleccionado para la comision: </label>
		</td>
		<td>
			<u><label id = "VehiculoSeleccionado"><?php echo $row['strVehiculo'];  ?></label></u>
		</td>
		
		<td>
			<label>Placa del vehiculo: </label>
		</td>
		<td>
			<u><label id = "PlacaVehiculo"><?php echo $row['iPlaca']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Kilometraje de salida: </label>
		</td>
		<td>
			<u><label id = "KMSalida"><?php echo $row['KM_Salida']; ?> KM.</label></u>
		</td>
		
		<td>
			<label>Kilometraje de regreso: </label>
		</td>
		<td>
			<u><label><?php echo $row['KM_Regreso']; ?> KM.</label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Kilometraje Total: </label>
		</td>
		<td>
			<u><label><?php echo $row['KM_Regreso'] - $row['KM_Salida']; ?> KM.</label></u>
		</td>
	</tr>
	<?php 
	$Herramientasss = array("LLANTA DE REPUESTO","TARJETA DE CIRCULACION","TRICKET Y BARILLA","EXTINGUIDOR","LLAVE DE CHUCHOS","TRIANGULOS DE EMERGENCIA");
	for($i = 0; $Herramientasss[$i]; $i++){ ?>
	<tr>
		<td>
			<label><?php echo $Herramientasss[$i]; ?></label>
		</td>
		<td>
			<input type = "checkbox" <?php echo $Herramientas[$i]['idHerramiento'] ? "checked" : false; $i++ ?>  readonly/>
		</td>
		<td>
			<label><?php echo $Herramientasss[$i]; ?></label>
		</td>
		<td>
			<input type = "checkbox" <?php echo $Herramientas[$i]['idHerramiento'] ? "checked" : false; ?>  readonly/>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td>
			<label>Fecha exacta de la salida de la Solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaSolicitud"><?php echo $row['FechaInicioReal']->format("d-m-Y"); ?></label></u>
		</td>
		
		<td> 
			<label>Hora exacta de la salida de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraSolicitud"><?php echo $row['HoraInicioReal']->format("H:i"); ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Fecha exacta de la finalizacion de la Solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaSolicitud"><?php echo $row['FechaFinalReal']->format("d-m-Y"); ?></label></u>
		</td>
		
		<td> 
			<label>Hora exacta de la finalizacion de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraSolicitud"><?php echo $row['HoraFinalReal']->format("H:i"); ?></label></u>
		</td>

	</tr>
	<tr>
	<td> 
			<label>Observaciones Generales: </label>
		</td>
		<td>
			<u><textarea class="form.control" id = "observaciones" readonly><?php echo $row['Observaciones']; ?></textarea></u>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<label>Autorizador de la solicitud: </label>
		</td>
		<td>
			<u><label><?php echo $row['strAutorizador']; ?></label></u>
		</td>
		<td>
			<label>Firma:______________________________</label>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	<tr>
	<tr>
		<td>
			<label>Piloto de la solicitud: </label>
		</td>
		<td>
			<u><label><?php echo $row['strPiloto']; ?></label></u>
		</td>
		<td>
			<label>Firma:______________________________</label>
		</td>
	</tr>
</table>
</div>
<!-- <a href="impresion.php?t=pdf" target="_blank">PDF</a> -->

</body>
</html>
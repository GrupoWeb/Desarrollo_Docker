<?php
    $Cod_Solicitud = $_GET['Solicitud'];
	$stSolicitante = $_GET['Solicitante'];
?>

<body>
	<form action="PHP/Reenvio_Solicitus.php" method="POST" enctype="multipart/form-data" style="max-height: 420px;">
     <div id="container" class="ltr" style="border: solid 0.5px; width:60%; background: hsl(0, 10%, 100%);">
  
<h1 id="logo"><div style="background-color: #33CCFF; width:100%;"> &nbsp;</div>
 </h1>
<h2>Reenvio de formulario para solicitud de Vehiculo </h2>
    	<table width="746" style = "margin-left: 10%;">
			<tr>
            	<td width="131" style = "background: #339999; color: #FFFFFF;" >No. Solicitud:</td>
            	<td width="143">  <? echo $Cod_Solicitud; ?>
           	  <input type = "hidden" id = "idSolicitud" name = "idSolicitud" value = "<? echo $Cod_Solicitud; ?>"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
                <td style = "background: #339999; color: #FFFFFF;" >Solicitante:</td><td><? echo $stSolicitante; ?></td>
				<td style = "background: #339999; color: #FFFFFF;" >Dependencia:</td><td>INFORMATICA</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
            	<td style = "background: #339999; color: #FFFFFF;" >Fecha Solicitud:</td>   <td id = "Fecha_Solicitud"></td>
			
            	<td width="140" style = "background: #339999; color: #FFFFFF;" >Hora Solicitud:</td>
            	<td width="312" id = "Hora_Solicitud"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
            	<td style = "background: #339999; color: #FFFFFF;" >Fecha Salida:   <td id = "Fecha_Salida"></td>
			
            	<td style = "background: #339999; color: #FFFFFF;" >Hora Salida:    <td id = "Hora_Salida"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
            	<td style = "background: #339999; color: #FFFFFF;" >Fecha Regreso:   <td id = "Fecha_Regreso"></td>
			
            	<td style = "background: #339999; color: #FFFFFF;" >Hora Regreso:   <td id = "Hora_Regreso"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
	   </table>
			<table width="743" style = "margin-left: 10%;">
			<tr>
            	<td width="129" style = "background: #339999; color: #FFFFFF;" >Direccion: 
            	<td width="605" id = "Direccion"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
	   </table>
			<table width="746" style = "margin-left: 10%;">
			<tr>
            	<td width="129" style = "background: #339999; color: #FFFFFF;" >Tipo de Solicitud: 
            	<td width="140" id = "Tipo_Solicitud"></td>
				<td width="145" style = "background: #339999; color: #FFFFFF;" >Tipo de Comisicon: 
				<td width="312" id = "Tipo_Comision"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			</table>
			<table width="746" style = "margin-left: 10%;">
			<tr>
            	<td width="134" style = "background: #339999; color: #FFFFFF;" >Motivo: 
            	<td width="600" id = "Motivo_Solicitud"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			</table>
			<table width="746" style = "margin-left: 10%;">
			<tr>
				<td><input id = "Yo" name = "Responsable" type = "radio" value = "0" required/><label>Yo conducire el vehiculo</label></td>
			  </tr>
				<tr>
				<td><input id = "Otra" name = "Responsable" type = "radio" value = "1"/><label>Otra persona conducira el vehiculo</label>
				</td>				
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<input class = "Persona" id = "Licencia" name = "Licencia" type = "file" required/>
				</td>
				<td>
					<label class = "OtraPersona">Nombre de la persona que conducira: </label>
					<input type = "text" class = "OtraPersona" /></td>
				</td>
			</tr>
			<tr>
				<td class = "Persona">&nbsp;</td>
			</tr>
			<tr>
				<td>
					<label class = "Persona">Ingrese el numero de licencia:</label><br>
					<input class = "Persona" name = "noLicencia" id = "noLicencia" type = "texte" required/>
				</td>
				<td>
					<label class = "Persona">Ingrese la fecha de vencimiento de licencia:</label><br>
					<input class = "Persona" name = "fechaVencimiento" id = "fechaVencimiento" type = "DATE" required/>
				</td>
				<td width="0"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
			<td width="333"><input type = "submit" value = "Reenviar Solicitud"/></td>
			<td width="397"><input type = "button" value = "Eliminar Solicitud"/></td>
			</tr>
       </table>
			<div id="pie3"> 
	                    <p><span id="tit" align="center">SOLICITUD DE VEHICULO MINECO</span> </p>
                   		<p align="center">  &copy; 2016 <a href="http://www.mineco.gob.gt">MINISTERIO DE ECONOMIA</a>	               
	   </div>
      </div>
    </form>
     <style>

.button {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3279a8), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3279a8, #65a9d7);
   background: -moz-linear-gradient(top, #3279a8, #65a9d7);
   background: -ms-linear-gradient(top, #3279a8, #65a9d7);
   background: -o-linear-gradient(top, #3279a8, #65a9d7);
   padding: 9px 18px;
   -webkit-border-radius: 3px;
   -moz-border-radius: 3px;
   border-radius: 3px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 13px;
   font-family: 'Lucida Grande', Helvetica, Arial, Sans-Serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: #28597a;
   background: #28597a;
   color: #ccc;
   }
.button:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }

#pie3

{
	font-size:12px;
	width:auto;
	height:80px;
	font-family:"Segoe UI";
	font-style:normal;
	font-color: white;
	border-top-color:black;
	background:#999999;
	color:#FFFFFF;
	right: 300cm;

}
.Estilo2 {font-size: 50%}
</style>

	<script>		
		
		$(".OtraPersona").hide();
		$(".Persona").hide();
		
		$.ajax({ url: 'PHP/Carga_Fechas_Solicitud_Modificada.php',
        	data: {Solicitud: $("#idSolicitud").val()},
        	type: 'POST',
			async: false,
        		success: function(data) {
					alert(data);
					data = JSON.parse(data);/*
					$("#Fecha_Solicitud").append(data['dFecha_Solicitud']);
					$("#Hora_Solicitud").append(data['hHora_Solicitud']);
					$("#Fecha_Salida").append(data['dFecha_Salida']);
					$("#Hora_Salida").append(data['hHora_Salida']);
					$("#Fecha_Regreso").append(data['dFecha_Regreso']);
					$("#Hora_Regreso").append(data['hHora_Regreso']);
					$("#Direccion").append(data['strDireccion']);
					$("#Tipo_Solicitud").append(data['strTipo_Solicitud']);
					$("#Tipo_Comision").append(data['strTipo_Comision']);
					$("#Motivo_Solicitud").append(data['strMotivo']);*/
           	}
		});
		
		
	</script>
</body>
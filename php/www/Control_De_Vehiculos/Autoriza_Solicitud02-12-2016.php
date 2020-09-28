<?php
    $Cod_Solicitud = $_GET['Solicitud'];
	$stSolicitante = $_GET['Solicitante'];
?>
<body>
	<form action = "PHP/Autorizacion_Solicitud.php" method="POST" id = "Formulario">
	<div id="container" class="ltr" style="border: solid 0.5px; width:60%; background: hsl(0,0%,100%);">
  
<h1 id="logo"><div style="background-color: #33CCFF; width:100%;">&nbsp;</div>

<h2>Solicitudes de vehiculos para autorizar</h2>
    	<table width="738" height="392" style = "margin-left: 10%;">
		<tr>
            	<td width="136" style = "background: #339999; color: #FFFFFF;" >No. Solicitud</td>
            	<td width="139"><? echo $Cod_Solicitud; ?>
       	  <input type = "hidden" id = "idSolicitud" value = "<? echo $Cod_Solicitud; ?>"/></td>
		<tr>
		</tr>
            <td>&nbsp;</td>
		<tr>
		</tr>
            <td style = "background: #339999; color: #FFFFFF;" >Solicitante:<td><? echo $stSolicitante; ?></label></td>
			
			<td style = "background: #339999; color: #FFFFFF;" >Aprobador:<td id = "Aprobador"></td>
		<tr>
		</tr>
          	<td>&nbsp;</td>
		</tr>
		<tr>
            	  <td style = "background: #339999; color: #FFFFFF;" >Fecha Solicitud:</td>
            	    <td id = "Fecha_Solicitud"></td>
	      	
            	  <td width="118" style = "background: #339999; color: #FFFFFF;" >Hora Solicitud:</td>
            	    <td width="325" id = "Hora_Solicitud"></td>
		</tr>
		<tr>
          	<td>&nbsp;</td>
		<tr>
		</tr>
                  <td style = "background: #339999; color: #FFFFFF;" >Fecha Salida:</td>
                    <td id = "Fecha_Salida"></td>
			
                  <td style = "background: #339999; color: #FFFFFF;" >Hora Salida:</td>
                    <td id = "Hora_Salida"></td>
			
		</tr>
		<tr>
          	<td>&nbsp;</td>
		
		</tr>
		<tr>
                 <td style = "background: #339999; color: #FFFFFF;" >Fecha Regreso:</td>
                   <td id = "Fecha_Regreso"></td>
		
            	  <td style = "background: #339999; color: #FFFFFF;" >Hora Regreso:</td>
            	    <td id = "Hora_Regreso"></td>
		  </tr>
		<tr>
          	<td>&nbsp;</td>
		  </tr>
		  </table>
	 <div id = "Direcciones">
			
			</div>
      	<table width="738" height="58" style = "margin-left: 10%;">
			<tr>
            	<td width="138" height="29" style = "background: #339999; color: #FFFFFF;" >Tipo de la solicitud: 
            	<td width="162" id = "Tipo_Solicitud"></td>
				<td width="137" style = "background: #339999; color: #FFFFFF;" >Tipo de comision: 
				<td width="281" id = "Tipo_Comision"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
	  </table>
			<table width="737" style = "margin-left: 10%;">
			<tr>
            	<td width="157" style = "background: #339999; color: #FFFFFF;" >Motivo de la solicitud: 
            	<td width="568" id = "Motivo_Solicitud"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
	  </table>
		<table style = "margin-left: 10%;">
		<tr>
			<td>Vehiculo<font color="red">**</font> </td>
		</tr>
		<tr>
			<td><input type = "text" id = "TocaVehiculo" width="300%" name = "TocaVehiculo" placeholder = "Click para seleccionar un vehiculo" readonly/></td>
		</tr>
		<tr>
            	<td width="729" ><div style = "width: 90%;"><div id = "Vehiculo_Seleccionado"></div></div>
				<input type = "hidden" id = "idVehiculo" name = "idVehiculo">
				<input type = "hidden" id = "idSolicitud" name = "idSolicitud" value = "<? echo $Cod_Solicitud;?>">
		  </td>
		</tr>
		</table>
		<table width="700" style = "margin-left: 10%;">
		<tr>
				<td width="200">&nbsp;</td>
		  </tr>
		<tr>
			<td><input type = "submit" id = "submit" value = "Autorizar Solicitud"/></td>
			<td width="432"><input id = "Rechaza" type = "button" value = "Rechazar Solicitud"/></td>
		  <!--<td width="201"><input type = "button" id = "EnvioModificacion" value = "Modificar Solicitud"/></td>
			<td width="283"><input type = "button" id = "Rechazar" value = "Rechazar Solicitud"/>-->
		</tr>
	  </table>
		<div id="pie3"> 
	                    <p><span id="tit" align="center">SOLICITUD DE VEHICULO MINECO</span> </p>
                   		<p align="center">  &copy; 2016 <a href="http://www.mineco.gob.gt">MINISTERIO DE ECONOMIA</a>	               
      </div>
                </ul>
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
		$.ajax({ url: 'PHP/Carga_Fechas_Solicitud_Autoriza.php',
        	data: {Solicitud: $("#idSolicitud").val()},
        	type: 'POST',
			async: false,
        		success: function(data) {
					data = JSON.parse(data);
					
					$("#Aprobador").append(data['strAprobador']);
					$("#Motivo_Solicitud").append(data['strMotivo']);
					$("#Fecha_Solicitud").append(data['dFecha_Solicitud']);
					$("#Hora_Solicitud").append(data['hHora_Solicitud']);
					$("#Fecha_Salida").append(data['dFecha_Salida']);
					$("#Hora_Salida").append(data['hHora_Salida']);
					$("#Fecha_Regreso").append(data['dFecha_Regreso']);
					$("#Hora_Regreso").append(data['hHora_Regreso']);
					$("#Direccion").append(data['strDireccion']);
					$("#Tipo_Solicitud").append(data['strTipo_Solicitud']);
					$("#Tipo_Comision").append(data['strTipo_Comision']);
				
           	}
		});
		
				$.ajax({
			url: 'PHP/Carga_Direcciones.php',
			data: {idSolicitud: $("#idSolicitud").val()},
			type: 'POST',
			success: function(data){
				$("#Direcciones").append(data);
				$(".Modificar").hide();
			}
		});
	
		$(document).ready(function(){
		
			/*$('#EnviaSolicitud').click(function(){
				$.post('PHP/Autorizacion_Solicitud.php', $('#Formulario').serialize());
			});*/
		
        	$("#TocaVehiculo").click(function(){
				var envio = "p="+$("#idSolicitud").val()+"&fs="+$("#Fecha_Salida").text()+"&fr="+$("#Fecha_Regreso").text()+"&hs="+$("#Hora_Salida").text()+"&hr="+$("#Hora_Regreso").text();
				var popup = window.open("Formulario_Seleccion_Vehiculo.php?"+ envio, "Seleccion de vehiculos", 'width=1000,height=400'); 	
				popup.focus();
			});
			
			$("#Rechaza").click(function(){
				
				$("#submit").hide();
				
				var popup = window.open("Formulario_Rechaza_Solicitud.php?p="+$("#idSolicitud").val(), "Seleccion de vehiculos", 'width=1000,height=400'); 	
				popup.focus();
			});
			
     	});
	</script>
</body>
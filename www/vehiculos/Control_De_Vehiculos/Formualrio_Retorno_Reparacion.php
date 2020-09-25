<?php
    $idVehiculo = $_GET['idVehiculo'];
?>

<body>
	<form action="PHP/Retorna_Vehiculo_Reparacion.php" method="POST" >
     <div id="container" class="ltr" style="border: solid 0.5px; width:60%; background:#FFFFFF">
  
<h1 id="logo"><div style="background-color: #33CCFF; width:100%;">&nbsp;</div>
 </h1>
		<h2>Solicitudes de vehiculos para verificar</h2>
    	<table width="998" style = "margin-left: 10%;">
			<tr>
            	<td width="187" style = "background: #339999; color: #FFFFFF;">No. Servicio:</td>
            	<td width="166" id = "idReparacion"></td>
		      	<input type = "hidden" id = "idVehiculo" name = "idVehiculo" value = "<? echo $idVehiculo; ?>"/></td>
				<input type = "hidden" id = "RepaReparacion" name = "idReparacion"/>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
                <td style = "background: #339999; color: #FFFFFF;">Placa:</td><td id = "Placa"></td>
				<td style = "background: #339999; color: #FFFFFF;">Marca:</td><td id = "Marca"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
                <td style = "background: #339999; color: #FFFFFF;">Modelo:</td><td id = "Modelo"></td>
				<td style = "background: #339999; color: #FFFFFF;">Linea:</td><td id = "Linea"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
            	<td style = "background: #339999; color: #FFFFFF;">Fecha envio a servicio:</td>
            	<td id = "FechaEnvio"></td>
			
            	<td width="167" style = "background: #339999; color: #FFFFFF;">Hora envio a servicio:</td>
            	<td width="458" id = "HoraEnvio"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
	   		</table>
			<table width="998" style = "margin-left: 10%;">
              <tr>
                <td>Factura por servicio de mantemiento<font color="#FF0000">**</font></td>
              </tr>
              <tr>
                <td><input name="text" type = "text" id = "DescripcionFactura" readonly placeholder = "Click para ingresar factura"/></td>
			  </tr>
			  <tr>
				<td><label id = "idFactura"></label> </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
			  </table>
			<table width="998" style = "margin-left: 10%;">
              <tr>
                <td width="221">Kilometraje de regreso<font color="#FF0000">**</font></td>
                <td width="765"><input type = " text" id = "KMRegreso" name = "KMRegreso" required/>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><label>Kilometraje total Recorrido: </label>
                </td>
                <td><label id = "KMTotal">--Kilometraje Total--</label>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input name="submit" type = "submit" value = "Retornar Vehiculo"/></td>
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
		$.ajax({ url: 'PHP/Carga_VehiculoRetorno_Reparacion.php',
        	data: {idVehiculo: $("#idVehiculo").val()},
        	type: 'POST',
			async: false,
        		success: function(data) {
					data = JSON.parse(data);
					
					$("#Placa").append(data['iPlaca']);
					$("#Marca").append(data['strMarca_Vehiculo']);
					$("#Modelo").append(data['strModelo_Vehiculo']);
					$("#Linea").append(data['strLinea_Vehiculo']);
					$("#FechaEnvio").append(data['dFecha_Inicio_Reparacion']);
					$("#HoraEnvio").append(data['hHora_Inicio_Reparacion']);
					$("#idReparacion").append(data['idReparacion_Vehiculo']);
					$("#RepaReparacion").val(data['idReparacion_Vehiculo']);
           	}
		});
		
		$(document).ready(function(){
			
			$("#KMRegreso").keyup(function(){
				$.ajax({
					url: 'PHP/KM_Regreso_Reparacion.php',
					data: {KMRegreso: $("#KMRegreso").val(), idVehiculo: $("#idVehiculo").val()},
					type: 'POST',
					async: false,
					success: function(data){
						$("#KMTotal").empty();
						$("#KMTotal").append(data);
					}
				});
			});
			
			$("#DescripcionFactura").click(function(){
				var popup = window.open("Formulario_Descripcion_Factura_Repuesto.php?p="+$("#idReparacion").text(),"Ingreso descripcion factura por servicio de mantenimiento","width=1000, height=980");
				popup.focus();
			});
			
		});
	</script>
</body>
<?php
	session_start();
	ob_start();

	include('../conexion/conexion.php');
	// require_once '../conexion/conexion.php';

	// $idSolicitud = base64_decode($_REQUEST['p']);
	$idSolicitud = $_REQUEST['p'];
	
		//$idSolicitud = $_REQUEST['p'];
		// $idUsuario = $_SESSION['username'];

		//$idSolicitud = 30016;

$sql = "
    DECLARE @RETURN_VALUE INT;
    EXEC @RETURN_VALUE = SP_LReporte $idSolicitud";
    $result = sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            $data[]=$row;
		}
		
		

$template = '

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title>Control de Vehiculos -DIACO-</title>


<style type="text/css">
	@page{
		margin-top:10px;
			
	}
   
       
		.table,.recorrido{
           
			border:1px solid #000;
			background: #D1D1D1;
            height:50px;
            
		}

		.datos{
			width: 35%;
		    height:50px;
			padding-bottom: 45px;

		}
		.sindatos{
			width: 50%;
            height:50px;
			border:1px solid #000;
		}

		.recorrido{
			width:50%;
			text-align: right;
		}
		.fecha{
			width: 10%;
			
			padding-bottom: 45px;
		}

		.span{
			text-align:center;
	
		}
		.f{
			text-align:center !important;
		}

.vacio{
	width: 25%;
}

.lleno{
	
	text-align: left;
	height: 35px;
}


.observacion{
	text-align:left;
	padding-bottom: 260px;
	border:1px solid #000;
}

.titulo{
	text-align:center;
}

</style>
</head>

<body>	  
       	
	<table width="100%"  border="0" align="center">  
				  <tr>
				  	<td width="7%" height="25"><img src="logo.png" width="79" height="79"></td>
				    <td width="78%" height="25"><div align="right" class="titulo">
				      <div>
				        <p><center>
				        SOLICITUD DE MANTENIMIENTO Y/O REPARACIÓN MECANICA<br>
				          ME-G-ITR-AD-CMV-F01<br>
				          MINISTERIO DE ECONOMÍA         </center></p>
				        </div>
				    </div></td>
				    <td width="7%" height="25"><img src="mineco.jpg" width="120" height="79"></td>
				  </tr>
	</table>

        <table width="100%" height="792"  border="0" align="center" cellpadding="0" cellspacing="0">
        	<tr>
        		<td class="vacio">&nbsp;</td>
        		<td class="vacio">&nbsp;</td>
                <td class="vacio">&nbsp;</td>
                
        		<td class="lleno">Servicio No.<center><font color="red" size="6px"><b>SM-'.$data[0]['idServicio'].'</b></font></center></td>
        	</tr>
        	<tr>
        		<th class="lleno"><div align="left" class="legal">Fecha solicitud:</div></th>
        		<td class="vacio"><di>'; $template .= $data[0]['FECHA']; $template .='</div></td>
                <th class="lleno" colspan="2"><div align="left">Periodo Solicitado:___________ al ______________</div></th>
        	</tr>

        	<tr>
        		<th class="lleno" ><div align="left">Solicitante:</div></th>
        		<td class="vacio">'.$data[0]['NOMBRE'].'</td>
        		<th class="lleno"><div align="left">Departamento:</div></th>
        		<td class="vacio"> '.$data[0]['nombre_dependencia'].'</td>
        	</tr>
        	<tr>
        		<th class="lleno" ><div align="left" >Jefe de departamento:</div></th>
        		<td class="vacio">'.$data[0]['strJefe'].'</td>
        		<th class="lleno" colspan=2><div >Firma:___________________________<img src="sello.gif" width="110" height="46"></div></th>
        		
        	</tr>
            <tr>
	    <th class="direcciones" ><div align="left">Servicio Solicitado: &nbsp;&nbsp;&nbsp;&nbsp;</div></th>
	    <td colspan="3">'.$data[0]['strMotivo'].'</td>
            </tr> 
        	<br>
        	<tr >
        		<th  class="lleno" colspan="2" style="padding-top:25px;"><div >Firma:__________________________________________</div></th>
        		
        		<th  class="lleno" colspan=2><div >Vo.Bo.___________________________<img src="sello.gif" width="110" height="46"></th>
        		
        	</tr>
        	<tr>
            <tr >
        		<th  class="lleno" colspan="2" style="padding-top:-30px;"><center><div align="center">Solicitante</div></center></th>
        		<th  class="lleno" colspan="2" style="padding-top:-20px;"><center><div align="center">Jefe Administrativo </div></center></th>
        		
            </tr>


        	<tr>
        	    <th height="152" colspan="2" scope="row">

        			<p class="Estilo2">CONTROL DE GASOLINA </p>
        			<p><img src="gas.jpg" width="286" height="150"></p>
        		</th>
        		<th height="152" colspan="2" scope="row">

        			<p class="Estilo2">CONTROL DE VEHICULO </p>
        			<p><img src="vehiculo.gif" width="286" height="150"></p>
        		</th>
        	</tr>
<tr>
     <th colspan="4" scope="row">
        <table  width="100%"  border="0" align="center">
                <tr>
                        <td width="34%" class="smallList">Llanta de repuesto </td>
                        <td width="6%">
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                                 <td>&nbsp;</td>
                                        </tr>
                                </table>
                        </td>
                        <td width="7%">&nbsp;</td>
                        <td width="48%" class="smallList">Tarjeta de circulaci&oacute;n</td>
                        <td width="5%">
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                                <td>&nbsp;</td>
                                        </tr>
                                </table>
                        </td>
                        <td width="34%" class="smallList">Calcomania Impuesto</td>
                        <td width="6%">
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                                 <td>&nbsp;</td>
                                        </tr>
                                </table>
                        </td>
                        <td width="7%">&nbsp;</td>
                </tr>
                <tr>
                        <td class="smallList">Tricket y barilla </td>
                        <td>
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                                <td>&nbsp;</td>
                                        </tr>
                                </table>
                        </td>
                        <td>&nbsp;</td>
                        <td class="smallList">Extinguidor </td>
                        <td>
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                   <tr>
                                          <td>&nbsp;</td>
                                  </tr>
                                </table>
                        </td>
                      <td width="34%" class="smallList">Control GPS</td>
                        <td width="6%">
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                                 <td>&nbsp;</td>
                                        </tr>
                                </table>
                        </td>
                        <td width="7%">&nbsp;</td>
                </tr>
                <tr>
                        <td class="smallList">Llave de chuchos </td>
                        <td>
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                   <tr>
                                          <td>&nbsp;</td>
                                  </tr>
                                </table>
                        </td>
                        <td>&nbsp;</td>
                        <td class="smallList">Tri&aacute;ngulos de emergencia </td>
                        <td>
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                   <tr>
                                          <td>&nbsp;</td>
                                  </tr>
                                </table>
                        </td>
                        <td width="34%" class="smallList">Llave del Vehículo</td>
                        <td width="6%">
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0">
                                        <tr>
                                                 <td>&nbsp;</td>
                                        </tr>
                                </table>
                        </td>
                        <td width="7%">&nbsp;</td>
                </tr>
        </table>
     </th>
</tr>
        		<tr>
        			<th class="lleno"><div align="left">Nombre Piloto:</div>              </th>
        			<td class="vacio">_____________________</td>
        			<th class="lleno" colspan="2"><div align="left">Firma:___________________________________________</div></th>
        			
        		</tr>
        		<tr>
        			<th class="lleno"><div align="left">Vehículo:</div></th>
        			<td class="vacio">'.$data[0]['VEHICULO'].'</td>
        			<th class="lleno"><div align="left">Placa:</div> 
        			<td class="vacio">'.$data[0]['iPlaca'].'</td>
        		</tr>
        		<tr>
        			<th class="lleno"><div align="left">Fecha y hora salida:</div></th>
        			<td class="vacio">'.$data[0]['FECHA'].'</td>
        			<th class="lleno"><div align="left">Fecha y hora entrada:</div></th>
        			<td class="vacio"></td>
        		</tr>
        		<tr>
        			<th class="lleno" colspan=2 >Kilometraje Salida &nbsp;&nbsp;&nbsp;&nbsp;<span style="width:100%;">'.number_format($data[0]['KILOMETRAJE']).'</span></th>
        			<th class="lleno" colspan=2 ><div align="left">Kilometraje Entrada  ____________ Total: _______ </div></th>
   
        		</tr>
   
        	<tr>
        		<th colspan="4" class="observacion"><div align="left">Otros:</div></th>
        	</tr>

		</table>
		
		
</body>
</html>';


//print $template;


	include('../mpdf60/mpdf.php');
	$pdf = new mPDF('L','letter-P');
    	$template = mb_convert_encoding($template, 'UTF-8', 'UTF-8');
	$pdf->charset_in='windows-1252';
	$pdf->writeHTML($template);
	$filename = 'Servicios/Servicio No. '.$data[0]['idServicio'];
	$filename .= $row['idSolicitud_Vehiculo'];
	$filename .= '.pdf';
	$pdf->output($filename,'F',true);
	$pdf->output($filename,'I',true);
	exit;

?>
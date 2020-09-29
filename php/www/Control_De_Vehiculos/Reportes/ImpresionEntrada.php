<?

	require_once '../conexion/conexion.php';
	ob_start();
	session_start();
		$idSolicitud = $_REQUEST['p'];
		$idUsuario = $_SESSION['username'];
		//$idSolicitud = 10261;
		//$idUsuario = 11;
$sql = "
SELECT
	[sl].[Observaciones],
	[sl].[idSolicitud_Vehiculo],
	[sl].[dFecha_Solicitud],
	[sl].[hHora_Solicitud],
	[sl].[dFecha_Regreso],
	[sl].[hHora_Regreso],
	[sl].[dFecha_Salida],
	[sl].[hHora_Salida],
	[sl].[strMotivo],
	[sl].[idTipo_Comision],
	[dp].[nombre_dependencia],
	[be].[dFecha_Modificacion],
	[be].[hHora_Modificacion],
	[mr].[strMarca_Vehiculo],
	[ln].[strLinea_Vehiculo],
	[md].[strModelo_Vehiculo],
	([ss].[nombre1]  + ' ' + [ss].[apellidop] ) AS strSolicitante,
	([ap].[nombre1]  + ' ' + [ap].[apellidop] ) AS strAprobador,
	([at].[nombre1]  + ' ' + [at].[apellidop] ) AS strAutorizador,
	([tp].[strPiloto]  + ' ' + [tp].[strApellidos] ) AS strPiloto,
	([mr].[strMarca_Vehiculo] + ' , ' + [ln].[strLinea_Vehiculo] + ' , ' + [md].[strModelo_Vehiculo]) AS strVehiculo,
	[v].[iPlaca],
	[KV].[KM_Salida],
	[KV].[KM_Regreso],
	[bs].[dFecha_Modificacion] AS [FechaInicioReal],
	[bs].[hHora_Modificacion] AS [HoraInicioReal],
	[bss].[dFecha_Modificacion] AS [FechaFinalReal],
	[bss].[hHora_Modificacion] AS [HoraFinalReal],
	idPiloto_Asignado

FROM
	[dbo].[tbSolicitud_Vehiculo] AS [sl] 
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [ss] ON [ss].[id_usu] = [sl].[idSolicitante] 
	INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
	INNER JOIN [dbo].[tbBitacora_Estado_Solicitud] AS [be] ON [be].[idSolicitud] = [sl].[idSolicitud_Vehiculo] AND [be].[idEstaod_Solicitud] = 5
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [ap] ON [ap].[id_usu] = [sl].[idAprobador]  
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [at] ON [at].[id_usu] = [sl].[idAutorizador] 
	INNER JOIN [tbKM_Vehiculo_Soloicitud] AS [KV] ON [KV].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
	INNER JOIN [tbVehiculo] AS [v] ON [v].[idVehiculo] = [KV].[idVehiculo]
	INNER JOIN [tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [v].[idMarca_Vehiculo] 
	INNER JOIN [tbModelo_Vehiculo] AS [md] ON [md].[idModelo_Vehiculo] = [v].[idModelo_Vehiculo] 
	INNER JOIN [tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [v].[idLinea_Vehiculo]
	INNER JOIN [tbAsignacionPiloto] AS [asp] ON [asp].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [pl] ON [pl].[id_usu] = $idUsuario
	INNER JOIN [tbBitacora_Estado_Solicitud] AS [bs] ON [bs].[idSolicitud] = [sl].[idSolicitud_Vehiculo] AND [bs].[idEstaod_Solicitud] = 1
	INNER JOIN [tbBitacora_Estado_Solicitud] AS [bss] ON [bss].[idSolicitud] = [sl].[idSolicitud_Vehiculo] AND [bss].[idEstaod_Solicitud] = 5
	inner join tbPiloto as tp on tp.idPiloto = asp.idPilotoAsignado 
WHERE 
	[sl].[idSolicitud_Vehiculo] = $idSolicitud
	and asp.idSolicitud = sl.idSolicitud_Vehiculo;
";
	$result = sqlsrv_query($conn, $sql);
	$row = array();
$Direcciones = array();
$Herramientos = array();

if($result)
	
{
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
	
	$ssql = "
	SELECT	
		[dp].[strDepartamento],
		[mn].[strMunicipio],
		[ds].[strDireccion] 
	FROM	  
		[dbo].[tbDirecciones_Solicitud] AS [ds]
		INNER JOIN [dbo].[tbDepartamento] AS [dp] ON [dp].[idDepartamento] = [ds].[idDepartamento]
		INNER JOIN [dbo].[tbMunicipio] AS [mn] ON [mn].[idMunicipio] = [ds].[idMunicipio]
	WHERE
		[ds].[idSolicitud_Vehiculo] =  $idSolicitud
	";
	
	$rresult = sqlsrv_query($conn, $ssql);
	if($rresult)
	{

		$Direcciones = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC);
		$i = 0;
		while($Direcciones[$i] = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC))
		{
			$i++;
		}
		
		$sqql = "
		SELECT
			[ah].[idHerramiento],
			[h].[strHerramienta_Vehiculo] 
		FROM	
			[dbo].[tbKM_Vehiculo_Soloicitud] AS [KV] 
			INNER JOIN [dbo].[tbAsignacion_Herramientas] AS [ah] ON [ah].[idVehiculo] = [KV].[idVehiculo] 
			INNER JOIN [dbo].[tbHerramienta_Vehiculo] AS [h] ON [h].[idHerramienta_Vehiculo] = [ah].[idHerramiento] 
		WHERE
			[KV].[idSolicitud] = $idSolicitud
			AND [ah].[bActivo] = 1
		";
		
		$reesult = sqlsrv_query($conn, $sqql);
		
	}

}


ob_start();




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
	width: 25%;
	text-align: left;
	height: 42px;
}

.observacion{
	text-align:left;
	padding-bottom: 100px;
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
                        RETORNO DE VEHÍCULO PARA COMISIÓN<br>
                          ME-VIAFI-DA-CV-02<br>
                          MINISTERIO DE ECONOMÍA         </center></p>
                        </div>
                    </div></td>
                    <td width="7%" height="25"><img src="mineco.jpg" width="120" height="79"></td>
                  </tr>
    </table> 
    <table cellspacing="0" >
        <tr>
            <td colspan="6" class="table" >
                <center><h2>CONTROL DE VEHÍCULO</h2></center>
            </td>
        </tr>
        <tr>
                <th height="152" colspan="3" scope="row">

                    <p><img src="gas.jpg" width="286" height="150"></p>
                </th>
                <th height="152" colspan="3" scope="row">

                    <p><img src="vehiculo.gif" width="286" height="150"></p>
                </th>
        </tr>

<tr>
     <th colspan="6" scope="row">
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
			<td colspan="6" class="table" >
				<center><h2>RECEPCIÓN DEL VEHÍCULO</h2></center>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="datos">
				Nombre del Piloto:  </td>
			<td colspan="4">'.$row['strPiloto'].'
			</td>
		
		</tr>
		<tr>
			<td colspan="6" class="table" >
				<center><h2>DATOS DEL VEHÍCULO</h2></center>
			</td>
		</tr>
		<tr>
					<td colspan="1" class="datos">Marca:</td>
					<td>'.$row['strMarca_Vehiculo'].'</td>
					<td colspan="1" class="datos">Modelo:</td>
					<td>'.$row['strModelo_Vehiculo'].'</td>
					<td colspan="1" class="datos">Placa:</td>
					<td>'.$row['iPlaca'].'</td>
					
		</tr>
		<tr>
			<td colspan="6" class="table">
				<center><h2>KILOMETRAJE</h2></center>
			</td>
		</tr>
		<tr>
					<td colspan="2" class="datos" >Salida:</td>
					<td>'.number_format($row['KM_Salida']).'</td>
					<td colspan="2" class="datos">Entrada</td>
					<td>'.number_format($row['KM_Regreso']).'</td>
				
		</tr>
		<tr>
			<td colspan="4" class="recorrido" >
				<h2>TOTAL DE KILOMETROS RECORRIDOS</h2>
			</td>
			<td colspan="2" class="datos" style="text-align:center;padding:25px;" >
				'.number_format($row['KM_Regreso'] - $row['KM_Salida']).' KM
			</td>
		</tr>
		<tr>
			<td colspan="6" class="table" >
				<center><h2>El vehículos descritos, lo recibo a mi entera satisfacción en las condiciones indicadas en el presente formulario.</h2></center>
			</td>
		</tr>
		<tr>
			<td  class="fecha" style="padding-top:-60px; ">Fecha: '.date("d-m-Y").'</td>
			<td class="fecha" style="padding-top:-60px;">Día: '.date("d").'</td>
			<td class="fecha" style="padding-top:-60px;">Mes: '.date("m").'</td>
			<td class="fecha" style="padding-top:-60px;">Año: '.date("Y").'</td>
			<td colspan="2" rowspan="6" class="datos" style="border:1px solid #000;padding-bottom:150px;">Firma del Piloto</td>
		</tr>


	</table>
		
</body>
</html>';


//print $template;


	include('../mpdf60/mpdf.php');
	$pdf = new mPDF('L','letter-P');
	//$css = file_get_contents('bootstrap/css/bootstrap.css');
	$template = mb_convert_encoding($template, 'UTF-8', 'UTF-8');
	$pdf->charset_in='windows-1252';
	//$pdf->setFooter("Página {PAGENO} de {nb}");
	//$pdf->writeHTML($css,1);
	$pdf->writeHTML($template);
	//$pdf->pdf->IncludeJS('print(TRUE)');
	$filename = 'Entradas/Solicitud No. ';
	$filename .= $row['idSolicitud_Vehiculo'];
	$filename .= '.pdf';
	$pdf->output($filename,'F',true);
	$pdf->output($filename,'I',true);
	exit;

/*	$template = mb_convert_encoding($template,'UTF-8', 'windows-1252');
require_once('../dompdf/pdf/dompdf_config.inc.php');
$dompdf = new DOMPDF();
$dompdf ->set_paper("letter", "portraint");
$dompdf ->load_html($template);
$dompdf ->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$canvas->page_text(522, 760, "Pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0,0,0));
$dompdf ->stream("ACTA1.pdf", array("Attachment" => false));*/
	?>
<?

	require_once '../conexion/conexion.php';
	ob_start();
	session_start();
		$idSolicitud = $_REQUEST['p'];
		$idUsuario = $_SESSION['username'];

		//$idSolicitud = 20161;
		//$idUsuario = 11;
/*$sql = "
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
";*/

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
    idPiloto_Asignado,
    js.strJefe,
    mt.strMotivo  as newmotivo

FROM
    [dbo].[tbSolicitud_Vehiculo] AS [sl] 
    INNER JOIN [syslogin].[dbo].[Tusuario] AS [ss] ON [ss].[id_usu] = [sl].[idSolicitante] 
    INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
    INNER JOIN [dbo].[tbBitacora_Estado_Solicitud] AS [be] ON [be].[idSolicitud] = [sl].[idSolicitud_Vehiculo] AND [be].[idEstaod_Solicitud] = 1
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
    INNER JOIN [tbBitacora_Estado_Solicitud] AS [bss] ON [bss].[idSolicitud] = [sl].[idSolicitud_Vehiculo] AND [bss].[idEstaod_Solicitud] = 1
    inner join tbPiloto as tp on tp.idPiloto = asp.idPilotoAsignado 
    inner join [syslogin].[dbo].[Jefes] as [js] ON [js].codDependencia = dp.id_dependencia
    inner join tbMotivos as mt ON mt.idsolicitud = [sl].[idSolicitud_Vehiculo]
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
	
	text-align: left;
	height: 35px;
}


.observacion{
	text-align:left;
	padding-bottom: 60px;
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
				        SOLICITUD DE VEHÍCULO PARA COMISIÓN<br>
				          ME-G-ITR-AD-NVC-F01<br>
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
        		<td class="lleno">Solicitud No.<center><font color="red" size="6px"><b>'.$row['idSolicitud_Vehiculo'].'</b></font></center></td>
        	</tr>
        	<tr>
        		<th class="lleno"><div align="left" class="legal">Fecha solicitud:</div></th>
        		<td class="vacio"><di>'; $template .= $row['dFecha_Solicitud'] != NULL ? $row['dFecha_Solicitud']->format("d-m-Y") : 'Solicitud sin fecha de salida'; $template .='</div></td>
        		<th class="lleno"><div align="left">Hora Comisión:</div></th>
        		<td class="vacio"><div>'; $template .=$row['hHora_Solicitud'] != NULL ? $row['hHora_Solicitud']->format("H:i") : 'Solicitud sin hora de salida'; $template.='</div> </td>
        	</tr>
        	<tr>
        		<th class="lleno"><div align="left">Periodo Solicitud:</div></th>
        		<td class="vacio"><div>'; $template .=$row['dFecha_Salida'] != NULL ? $row['dFecha_Salida']->format("d-m-Y") : 'Solicitud sin fecha de salida'; $template .='</div></td>
        		<th class="lleno"><div  align="left">Hasta:</div></th>
        		<td class="vacio"><div>'; $template .=$row['dFecha_Regreso'] != NULL ? $row['dFecha_Regreso']->format("d-m-Y") : 'Solicitud sin fecha de salida'; $template.='</div></td>
        	</tr>
        	<tr>
        		<th class="lleno" ><div align="left">Solicitante:</div></th>
        		<td class="vacio">'.$row['strSolicitante'].'</td>
        		<th class="lleno"><div align="left">Departamento:</div></th>
        		<td class="vacio"> '.$row['nombre_dependencia'].'</td>
        	</tr>
        	<tr>
        		<th class="lleno" ><div align="left" >Jefe de departamento:</div></th>
        		<td class="vacio">'.$row['strJefe'].'</td>
        		<th class="lleno" colspan=2><div >Firma:___________________________<img src="sello.gif" width="110" height="46"></div></th>
        		
        	</tr>
            <tr>
            <th class="direcciones" ><div align="left">Lugar de comisión: &nbsp;&nbsp;&nbsp;&nbsp;</div></th>
            </tr> 
            '. 
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
                        $i = 0;
                        while($Direcciones[$i] = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC))
                        {
                            $template .='
                                 <tr>
                                    <th  ><div align="left"> &nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                    <td  colspan=3 ><div style="font-size:9px;text-align: justify;">'.$Direcciones[$i]['strDireccion'].' '.$Direcciones[$i]['strDepartamento'].','.$Direcciones[$i]['strMunicipio'].'</div></td>
                                </tr>   
                                ';
                            $i++;
                         }

                    }
       $template .= '
            
        	<tr>
        		<th class="lleno" style=""><div align="left">Justificación:</div></th>
        		<th class="lleno" colspan="3"  style="font-size:9px;text-align: justify;">'.$row['newmotivo'].'</th>
        	</tr>
        	<tr>
        		<th class="lleno"><div align="left">Comisión Menor:</div></th>
        		<td width="1%">
                    <table width="15%"  border="1" cellpadding="0" cellspacing="0">
                        <tr>
                                <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>

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
        		<th class="lleno"><div align="left">Comisión Mayor:</div></th>
        		<td width="1%">
                    <table width="15%"  border="1" cellpadding="0" cellspacing="0">
                        <tr>
                                <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <th  class="lleno" colspan="4"><div align="left">Firma:__________________________________________</div></th>
        	</tr>
            <tr >
            <th  class="lleno" colspan="2" style="padding-top:-15px;padding-bottom:15px;height:10px;"><center><div align="center"></div></center></th>
        		<th  class="lleno" colspan="2" style="padding-top:-10px;padding-bottom:15px;height:10px;"><center><div align="center">Dirección o Subdirección</div></center></th>
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
        			<td class="vacio">'.$row['strPiloto'].'</td>
        			<th class="lleno" colspan="2"><div align="left">Firma:___________________________________________</div></th>
        			
        		</tr>
        		<tr>
        			<th class="lleno"><div align="left">Vehículo:</div></th>
        			<td class="vacio">'.$row['strVehiculo'].'</td>
        			<th class="lleno"><div align="left">Placa:</div> 
        			<td class="vacio">'.$row['iPlaca'].'</td>
        		</tr>
        		<tr>
        			<th class="lleno"><div align="left">Fecha y hora salida:</div></th>
        			<td class="vacio">'.$row['FechaInicioReal']->format("d-m-Y").'  '.$row['HoraInicioReal']->format("H:i").'</td>
        			<th class="lleno"><div align="left">Fecha y hora entrada:</div></th>
        			<td class="vacio"></td>
        		</tr>
        		<tr>
        			<th class="lleno" colspan=2 >Kilometraje Salida &nbsp;&nbsp;&nbsp;&nbsp;<span style="width:100%;">'.number_format($row['KM_Salida']).'</span></th>
        			<th class="lleno" colspan=2 ><div align="left">Kilometraje Entrada  ____________ Total: _______ </div></th>
   
        		</tr>
   
        	<tr>
        		<th colspan="4" class="observacion"><div align="left">Observaciones:'.$row['Observaciones'].'</div></th>
        	</tr>

		</table>
		
		
</body>
</html>';


//print $template;


	include('../mpdf60/mpdf.php');
	$pdf = new mPDF('L','letter-P');
    	$template = mb_convert_encoding($template, 'UTF-8', 'UTF-8');
    //$pdf = mb_convert_encoding($template, 'UTF-8', 'UTF-8');
	//$css = file_get_contents('bootstrap/css/bootstrap.css');
	$pdf->charset_in='windows-1252';
	//$pdf->setFooter("Página {PAGENO} de {nb}");
	//$pdf->writeHTML($css,1);
	$pdf->writeHTML($template);
	//$pdf->pdf->IncludeJS('print(TRUE)');
	$filename = 'Salidas/Solicitud No. ';
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
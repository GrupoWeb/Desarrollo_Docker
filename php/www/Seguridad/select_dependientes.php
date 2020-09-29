<?php
function generaPaises()
{
require 'Conexiones/conexion.php'
	$consulta=sqlsrv_query("select *from Tsistema");

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='paises' id='paises' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=sqlsrv_fetch_array( $consulta, SQLSRV_FETCH_ASSOC))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">


<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>AJAX, Ejemplos: Combos (select) dependientes, codigo fuente - ejemplo</title>
<link rel="stylesheet" type="text/css" href="select_dependientes.css">
<script type="text/javascript" src="select_dependientes.js"></script>
</head>

<body>

			<div id="demo" style="width:600px;">
				<div id="demoDer">
					<select disabled="disabled" name="estados" id="estados">
						<option value="0">Selecciona opci&oacute;n...</option>
					</select>
				</div>
				<div id="demoIzq"><?php generaPaises(); ?></div>
			</div>
			
</body>
</html>
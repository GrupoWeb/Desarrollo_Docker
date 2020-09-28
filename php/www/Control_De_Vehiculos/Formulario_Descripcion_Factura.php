<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ingreso Factura</title>
<script type='text/javascript' src="js/jquery.min.js"></script>
<form action = "PHP/Ingresa_Factura.php" />
</head>

<body style="font-family: 'Segoe UI';">
<h1 align = "center">Ingreso de factura por Mantenineto de Vehiculo</h1>
<div align="right">
	<label>No. Factura</label>
	<input type = "text" name = "noFactura" id = "noFactura" required/>
</div>
<br />
<div align="center">
	<h4>Ingreso detalles de la mano de obra</h4>
</div>
<table align = "center">
	<thead>
		<tr>
			<td>Cantidad</td>
			<td>Descripcion Servicio</td>
			<td>Valor Unidad </td>
			<td>Subotal</td>
		</tr>
	</thead>
	<tbody  id = "Extra">
		<tr>
			<td><input type = "number" name = "Cantidad0" required/></td>
			<td><input type = "text" name = "Descripcion0" required/></td>
			<td><input type = "text" name = "Valor0" required/></td>
			<td><input type = "text" name = "ValorTotal0" required disabled/></td>
		</tr>
	</tbody>
		<tr>
			<td><input type = "button" id = "Agragar" value = "Agregar Mano de obra" /></td>
			<td><input type = "button" id = "Eliminar" value = "Eliminar Mano de obra" /></td>
		</tr>
</table>
<br />
<div align="center">
	<h4>Ingreso detalles de repuestos </h4>
	<input type = "hidden" name = "idServicio" id = "idServicio" value = "<? echo $_REQUEST['p']; ?>"/>
</div>
<table align = "center">
	<thead>
		<tr>
			<td>Cantidad</td>
			<td>Descripcion Servicio</td>
			<td>Valor Unidad </td>
			<td>SubTotal</td>
		</tr>
	</thead>
	<tbody  id = "ExtraRepuesto">
		<tr>
			<td><input type = "number" name = "CantidadRepuesto0" required/></td>
			<td><select id = "Repuesto0" name = "Repuesto0"></select></td>
			<td><input type = "text" name = "ValorRepuesto0" required/></td>
			<td><input type = "text" name = "ValorTotalRepuesto0" required disabled/></td>
		</tr>
	</tbody>
		<tr>
			<td><input type = "button" id = "AgragarRepuesto" value = "Agregar Repuesto" /></td>
			<td><input type = "button" id = "EliminarRepuesto" value = "Eliminar Repuesto" /></td>
		</tr>
</table>
<br />
<br />
<div  align = "center">
	<input type = "submit" value = "Ingresar Factura" />
</div>
<script>

	$.ajax({
		url: 'PHP/Carga_Repuesto.php',
		data: {},
		type: 'POST',
		async: false,
		success: function(data){
			$("#Repuesto0").empty();
			$("#Repuesto0").append(data);
		}
	});

	$(document).ready(function(){
		
		var x = 1;
		$("#Agragar").click(function(){
			$("#Extra").append('<tr id = "MO'+x+'"><td><input type = "number" name = "Cantidad'+x+'" required/></td><td><input type = "text" name = "Descripcion'+x+'" required/></td><td><input type = "text" name = "Valor'+x+'" required/></td><td><input type = "text" name = "ValorTotal'+x+'" required disabled/></td></tr>');
		x++;
		});
	
		var y = 1;
		$("#AgragarRepuesto").click(function(){
			$("#ExtraRepuesto").append('<tr id = "Repuesto'+y+'"><td><input type = "number" name = "CantidadRepuesto'+y+'" required/></td><td><input type = "text" name = "DescripcionRepuesto'+y+'" required/></td><td><input type = "text" name = "ValorRepuesto'+y+'" required/></td><td><input type = "text" name = "ValorTotalRepuesto'+y+'" required disabled/></td></tr>');
		y++;
		});
		
		
		$("#Eliminar").click(function(){
			if(x > 1){
				x--;
				var contenedor = "#MO"+x;
				$(contenedor).remove();
			}
		});
		
		$("#EliminarRepuesto").click(function(){
			if(y > 1){
				y--;
				var contenedor = "#Repuesto"+y;
				$(contenedor).remove();
			}
		});
		
	});
</script>
</body>
</html>

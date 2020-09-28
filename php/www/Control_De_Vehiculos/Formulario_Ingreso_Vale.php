<body onload = "Carga_Contenido()">
	<form action ="PHP/Ingreso_Vales.php" method ="POST">
		<div id="container" style="b width:100%;">


			<br>
			<center><h2>Ingreso de Servicio de mantenimiento del vehiculo	</h2></center>
			<br>
			<p>Todos los campos son oblitorios para porder enviar la solicitud</p>
			<table class="table" style="width:80%;">
				<tr>
					<td> Vale del corelativo:
					</td>
					<td>
						<input class="form-control" style="border:1px solid #000;" type = "text" id = "ValesIniciales" name = "ValesIniciales" required/>
					</td>
					<td>
						al
					</td>
					<td>
						<input class="form-control" style="border:1px solid #000;"  type = "text" id = "ValesFinales" name = "ValesFinales" required/>
					</td>
				</tr>
				<td>&nbsp;</td>
			</tr>
			<td>Monto Vale
			</td>

			<td>
				<input class="form-control" style="border:1px solid #000;"  type = "text" id = "Monto" name = "Monto" required/>
			</td>
		</tr>
		<td>&nbsp;</td>
	</tr> 
	<tr>             
		<td id="foli4" class="notranslate">
			<input type = "submit" value = "Enviar formulario" class="btn btn-success"/>
		</td>
	</tr>
	<td>&nbsp;</td>
</table>

</div>
</form>
<style>

td{
	display: inline-block;
}
#pie3

{

	font-size:12px;
	width:100%;
	height:80px;
	font-family:"Segoe UI";
	font-style:normal;
	font-color: white;
	border-top-color:black;
	background:#005588;
	color:#FFFFFF;
	text-align: center;

}
</style>
</body>

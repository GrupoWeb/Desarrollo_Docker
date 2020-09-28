<body>
	<form  action = "PHP/Ingreso_Vehiculo.php" method = "POST">		
			<div id="container" style=" width:100%;">
  


					<h2>Ingreso de Vehiculos</h2>

            <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
                   
				<ul>
                    <li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "Placa_Vehiculos">Placa del vehiculo: </label> &nbsp;&nbsp;
                        <input type = "text" id = "Placa_Vehiculo" class="form-control corto" name = "Placa_Vehiculo" required autofocus/>
                    </li>
					<li>&nbsp;</li>
					<li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "Tipo">Tipo de vehiculo: </label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <select class="form-control corto" id = "Tipo" name = "Tipo" required>
                            <option value = "0">--Seleccione una opcion--</option>
                        </select>
                    </li>  
					<li>&nbsp;</li>
					<li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "Piloto">Piloto Encargado: </label>&nbsp;&nbsp;&nbsp;
                        <select  class="form-control corto" id = "Piloto" name = "idPiloto" required>
                            <option value = "0">--Seleccione una opcion--</option>
                        </select>
<!-- 
						<table ><tr><td id="Seleccion_Piloto">Click para buscar Piloto</td></tr></table>
                        <input type = "hidden" name = "idPiloto" id = "idPiloto"/> -->
				    </li>
					<li>&nbsp;</li>
                    <li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "Marca">Marca: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select class="form-control corto" id = "Marca" name = "Marca" required>
                            <option value = "0">--Seleccione una opcion--</option>
                        </select>
                    </li>
					<li>&nbsp;</li>
					<li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "Modelo">Modelo: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select class="form-control corto" id = "Modelo" name = "Modelo" required>
                            <option value = "0">--Seleccione una opcion--</option>
                        </select>
                    </li>
					<li>&nbsp;</li>
					<li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "Linea">Linea: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        <select  class="form-control corto" id = "Linea" name = "Linea" required>
                            <option value = "0">--Seleccione una opcion--</option>
                        </select>
                    </li>         
					<li>&nbsp;</li>
                    <li id="foli4" class=" list-group-item line">
                        <label class = "desc" for ="Color">Color: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                        <input class="form-control corto" type = "text" id = "Color" name = "Color" required/>
                    </li>
					<li>&nbsp;</li>
                        <li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "VIN">SICOIN del Vehiculo:  </label>&nbsp;&nbsp;
                        <input class="form-control corto" type = "text" id = "VIN" name = "VIN" required/>
                    </li>
					<li>&nbsp;</li>
                  <li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "Estado">Estado: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select class="form-control corto" id = "Estado" name = "Estado" required>
                          <option value = "0">--Seleccione una opcion--</option>
                        </select>
                  </li>
				  <li>&nbsp;</li>
<!--                     <li id="foli4" class="notranslate">
                        <label class = "desc" for = "GPS">Codigo GPS: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type = "text" id = "GPS" name = "GPS" required/>
                    </li> -->
					<li>&nbsp;</li>
                    <li id="foli4" class=" list-group-item line">
                        <label class = "desc" for = "KM_Actual">Kilometraje Actual:</label>&nbsp;
                         <input type = "text" class="form-control corto" id = "KM_Actual" name = "KM_Actual" required/>
                    </li>
					<li>&nbsp;</li>
                    <li id="foli4" class=" list-group-item line">
                            <input class="btn btn-success" type = "submit" value = "Enviar formulario"/>
                    </li>
					<li>&nbsp;</li>

         </ul>

     </div>
	 </form>
<style>
.corto{
  width: 20%;
  display: inline-block;
  border: 0.5px solid #000;

}

.line{
  border:none;
}

</style>
	<script>
	$.ajax({
			url: 'PHP/Carga_Tipo_Vehiculo.php',
			async: false,
			success: function(data)
			{
				$("#Tipo").empty();
				$("#Tipo").append(data);
			}
		});

    $.ajax({
      url: 'PHP/Carga_Piloto.php',
      async: false,
      success: function(data)
      {
        $("#Piloto").empty();
        $("#Piloto").append(data);
      }
    });

    $.ajax({
      url: 'PHP/Carga_Estado.php',
      async: false,
      success: function(data)
      {
        $("#Estado").empty();
        $("#Estado").append(data);
      }
    });
		
		$.ajax({
			url: 'PHP/Carga_Marca.php',
			async: false,
			success: function(data)
			{
				$("#Marca").empty();
				$("#Marca").append(data);
			}
		});
	
	$(document).ready(function(){			
        	$("#Seleccion_Piloto").click(function(){
				var popup = window.open("Formulario_Seleccion_Piloto.php?", "Seleccion de pilotos", 'width=1000,height=400'); 	
				popup.focus();
			});
			
			$("#Marca").change(function(){
					$.ajax({
						url: 'PHP/Carga_Modelo.php',
						type: 'POST',
						data: {idMarca: $("#Marca").val()},
						async : false,
						success: function(data)
						{
							$("#Modelo").empty();
							$("#Modelo").append(data);
						}
						
					});
					
					$.ajax({
						url: 'PHP/Carga_Linea.php',
						type: 'POST',
						data: {idMarca: $("#Marca").val()},
						async : false,
						success: function(data)
						{
							$("#Linea").empty();
							$("#Linea").append(data);
						}
					});
					});
     	});
	</script>
</body>
<body onload = "Carga_Contenido()">
	<form action = "PHP/Ingreso_Modelo_Vehiculo.php" method =  "POST">
   <div id="container" class="ltr" style=" width:100%;">
    <br>
    <h2>Ingreso de Servicio de mantenimiento del vehículo 	</h2>
    <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
    <ul>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "idMarca_Vehiculo">Marca Vehículo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <select class="form-control" id = "idMarca_Vehiculo" name = "idMarca_Vehiculo" required>
          <option value="" disabled selected>--Seleccion una opcion--</option>
        </select>
      </label>
    </li>
    <li>&nbsp;</li>
    <li id="foli4" class="notranslate">
      <label class = "desc" for = "Modelo_Vehiculo">Modelo Vehículo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input class="form-control"type = "text" id = "Modelo_Vehiculo" name = "Modelo_Vehiculo" required/>
     </label>
   </li>
   <li>&nbsp;</li>                    
   <li id="foli4" class="notranslate">
    <input type = "submit" value = "Enviar formulario" class="btn btn-success"/>
  </li>

</ul>
</div>
</form>
<style>
input[type=text]:focus {
  background-color: lightblue;
}
</style>
<script>
$.ajax({
 url: 'PHP/Carga_Marca.php',
 async: false,
 success: function(data)
 {
  $("#idMarca_Vehiculo").empty();
  $("#idMarca_Vehiculo").append(data);
}
});
</script>
</body>

<body onload = "Carga_Contenido()">
	<form action = "PHP/Ingreso_Marca.php" method = "POST">
   <div id="container" class="ltr" style="width:100%;">
    <br>
      <h2>Ingreso de Servicio de mantenimiento del vehículo   </h2>
    <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
    <ul>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Marca_Vehiculo">Marca Vehiculo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="form-control" type = "text" id = "Marca_Vehiculo" name = "Marca_Vehiculo" required/>
       </label>
     </li>

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
</body>

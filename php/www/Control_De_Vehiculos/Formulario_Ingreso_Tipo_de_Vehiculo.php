<body>
	<form action = "PHP/Ingreso_Tipo_de_Vehiculo.php" method = "POST">
   <div id="container" style=" width:100%;">

    <br>

      <h2>Ingreso de Servicio de mantenimiento del vehículo   </h2>
    <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
    <ul>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Tipo_Vehiculo">Tipo de vehiculo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input class="form-control" style="border:1px solid #000;" type = "text" id = "Tipo_Vehiculo" name = "Tipo_Vehiculo" required autofocus/>
       </label>
     </li>
     <li>&nbsp;</li>                    
     <li id="foli4" class="notranslate">
      <input class="btn btn-success" type = "submit" value = "Enviar formulario"/>
    </li>
    <li>&nbsp;</li>

  </ul>
<style>
  input[type=text]:focus {
    background-color: lightblue;
}
</style>
</div>

</form>

</body>

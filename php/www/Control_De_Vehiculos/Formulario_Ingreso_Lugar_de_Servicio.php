<body onload = "Carga_Contenido()">
	<form action = "PHP/Ingreso_Lugar_De_Servicio.php" method = "POST">
   <div id="container" class="ltr" style=" width:100%;">

    <br>
    
    <h2>Ingreso de Lugares de servicio para el control de mantenimiento del vehículo   </h2>
    <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
    <ul>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Lugar_Servicio">Nombre del Lugar: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="form-control" type = "text" id = "Lugar_Servicio" name = "Lugar_Servicio" required/>
        </label>
      </li>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Dir_Servicio">Dirección del Lugar: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input class="form-control" type = "text" id = "Dir_Servicio" name = "Dir_Servicio" required/>
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
</body>

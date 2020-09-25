<body onload = "Carga_Contenido()">
	<form action = "#" method = "#">
   <div id="container" class="ltr" style=" width:100%;">

    <br>
      <h2>Ingreso de Servicio de mantenimiento del vehículo   </h2>
    <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
    <ul>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Estado">Estado: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input class="form-control" type = "text" id = "Estado" name = "Estado"  required/>
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

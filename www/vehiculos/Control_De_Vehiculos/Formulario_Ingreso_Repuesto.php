<body >
  <form  action="PHP/Ingreso_Repuesto.php" method="POST" enctype="multipart/form-data">
   <div id="container" style="width:90%;">

    <br>

    <h2>Ingreso de Servicio de mantenimiento del vehiculo	</h2>
    <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
    <ul>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Repuesto">Repuesto: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input class="form-control" type = "text" id = "Repuesto" name = "Repuesto" required/>
       </label>
     </li>
    
     <li id="foli4" class="notranslate">
      <label class = "desc" for = "Precio_Repuesto">Precio del repuesto: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input class="form-control" type = "text" id = "Precio_Repuesto" name = "Precio_Repuesto" required/>
     </label>
   </li>
  
   <li id="foli4" class="notranslate">
    <label class = "desc" for = "Tipo">Tipo de Repuesto: </label>&nbsp;&nbsp;&nbsp;&nbsp;
    <select class="form-control"  style="width:15%;" id = "Tipo" name = "Tipo" required>
      <option value = "0">--Seleccione una opcion--</option>
    </select>
  </li>                 
  <li id="foli4" class="notranslate">
    <input type = "submit" value = "Enviar formulario" class="btn btn-success" />
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
    url: 'PHP/Carga_Tipo_Respuesto.php',
    async: false,
    success: function(data)
    {
      $("#Tipo").empty();
      $("#Tipo").append(data);
    }
  });
</script>
</body>

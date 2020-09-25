<body>
	<form action="PHP/ingreso_Municipio.php" method="POST" enctype="multipart/form-data" >
    <div id="container" style=" width:100%;">

      <br>

      <h2>Ingreso de Municipio</h2>
      <ul>
        <li id = "folio4" class = "notraslate">
         <label class = "desc" for = "Departamento">Departamento<font color="red">**</font>
          <select class="form-control" id = "Departamento" name="Departamento" required>
            <option value="0">--Seleccione una Opción</option>
          </select>
        </label>
      </li>
      <li>&nbsp;</li>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Municipio">Municipio<font color="red">**</font> 
         <input class="form-control" type = "text" id = "Municipio" name = "Municipio"  />
       </label>
     </li>
     <li>&nbsp;</li>
     <li id="foli4" class="notranslate">
      <input class="btn btn-success" type = "submit" value = "Enviar formulario"/>
      
    </li>
    <li>&nbsp;</li>

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
    url: 'PHP/Carga_Departamento.php',
    async: false,
    success: function(data)
    {
      $("#Departamento").empty();
      $("#Departamento").append(data);
    }
  });
</script>
</body>


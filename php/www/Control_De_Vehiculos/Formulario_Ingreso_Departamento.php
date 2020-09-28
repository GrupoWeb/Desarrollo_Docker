<body onload = "Carga_Contenido()">
	<form action = "PHP/Ingreso_Departamento.php" method = "POST">
   <div id="container" class="ltr" style=" width:100%;">

    <br>
    <h2>Ingreso de Departamentos para el control de solicitud de vehículos	</h2>
    <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
    <ul>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Departamento">Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input class="form-control" type = "text" id = "Departamento" name = "Departamento" required/>
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

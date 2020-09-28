<body onload = "Carga_Contenido()">
	<form action = "PHP/Ingreso_Tipo_de_Repuesto.php" method = "POST">
   <div id="container" class="ltr" style=" width:100%;">

    <h1 id="logo"><div style="background-color: #33CCFF; width:100%;">&nbsp;</div>
    </h1>
    <h2>Ingreso de Tipos de Repuestos para el manejo de los servicios del vehículo</h2>
    <p>Todos los campos son obligatorios para poder enviar la solicitud</p>
    <ul>
      <li id="foli4" class="notranslate">
        <label class = "desc" for = "Tipo_Repuesto">Tipo de Repuesto: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type = "text" id = "Tipo_Repuesto" name = "Tipo_Repuesto" required/>
       </label>
     </li>
     <li>&nbsp;</li>                    
     <li id="foli4" class="notranslate">
      <input type = "submit" value = "Enviar formulario"/>
    </li>

 </ul>

</div>
</form>
<style>

</style>
</body>

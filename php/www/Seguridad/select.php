<body>
<?php

 <td width="105"><label class = "desc" for = "Departamento">Departamento<font color="red">**</font></label></td><td width="284">
                      <select id = "Departamento" name = "Departamento" required>
                        <option value = "0">--Seleccione una opcion--</option>
                      </select>&nbsp;
                  </label><label class = "desc" for = "Municipio">Municipio<font color="red">**</font></label></td><td width="194">
                      <select id = "Municipio" name = "Municipio" required>
                        <option value = "0">--Seleccione una opcion--</option>
                      </select>
                </td>





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
//		$("#Departamento").append("PHP/Carga_Departamento.php");
			
			$(document).ready(function(){
					
									
				$("#Departamento").change(function(){
					$.ajax({
						url: 'PHP/Carga_Municipio.php',
						type: 'POST',
						data: {idDepartamento: $("#Departamento").val()},
						async : false,
						success: function(data)
						{
							$("#Municipio").empty();
							$("#Municipio").append(data);
						}
					});
				});
				
		</script>
		
?>
</body>
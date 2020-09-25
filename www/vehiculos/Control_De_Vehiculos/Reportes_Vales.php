<?php
	require('conexion/conexion.php');
?>
<body>

		<script type='text/javascript' src="js/jquery.min.js"></script>
		<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="DataTables/datatables.js"></script>
		<script type='text/javascript' src="js/sum().js"></script>		
		<script type='text/javascript' src="js/jquery.form.js"></script>
	 	<!-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.css"/> -->
	 	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	 	


	<!--  <link rel="stylesheet" type="text/css" href="DataTables/datatables.css"/>
    <script type="text/javascript" src="DataTables/datatables.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="js/sum().js"></script> -->

<style>


.t{
  background: #005588;
  color:white;
  
  
}
.th{
  text-align: center;
  
}


</style>
	<form id = "Leforme" method="POST" enctype="multipart/form-data" name="form1" style = "position: relative;  width:80%;  display: inline-block;">
		<div align="center" class="form-group">
			<table  class="table table-condensed" >
					<tr>
						<td colspan="7" align="center">
							<h3>Filtos disponibles</h3>
						</td>
					</tr>
					<tr >
						<td style="border:none;">
							<label>Vales Asignado</label>
							<input class="form-contorl" type = "radio" name = "Asignacion" value = "1"/>
						</td>
						<td style="border:none;"></td>
						<td style="border:none;">
							<label>Vales sin Asignar</label>
							<input class="form-contorl" type = "radio" name = "Asignacion" value = "2"/>
						</td>
						<td style="border:none;"></td>
						<td style="border:none;">
							<label>Asignado y sin Asignar</label>
							<input class="form-contorl" type = "radio" 	name = "Asignacion" checked /> 
						</td>
					</tr>
					<tr>
						<td style="border:none;">&nbsp;</td>
					</tr>
					<tr>
						<td style="border:none;">
							<label>Vales del mes de: </label>
						</td>
						<td style="border:none;">
							<select class="form-control" id = "LeInicio" name = "MesIncio">
								<option value = "1">Enero</option>
								<option value = "2">Febrero</option>
								<option value = "3">Marzo</option>
								<option value = "4">Abril</option>
								<option value = "5">Mayo</option>
								<option value = "6">Junio</option>
								<option value = "7">Julio</option>
								<option value = "8">Agosto</option>
								<option value = "9">Septiembre</option>
								<option value = "10">Octubre</option>
								<option value = "11">Noviembre</option>
								<option value = "12">Diciembre</option>
							</select>
						</td>
						<td style="border:none;">&nbsp;</td>
						<td style="border:none;">
							<label>Hasta el mes de: </label>
						</td>
						<td style="border:none;">
							<select class="form-control" id = "LeInicio" name = "MesFinal">
								<option value = "1">Enero</option>
								<option value = "2">Febrero</option>
								<option value = "3">Marzo</option>
								<option value = "4">Abril</option>
								<option value = "5">Mayo</option>
								<option value = "6">Junio</option>
								<option value = "7">Julio</option>
								<option value = "8">Agosto</option>
								<option value = "9">Septiembre</option>
								<option value = "10">Octubre</option>
								<option value = "11">Noviembre</option>
								<option selected value = "12">Diciembre</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="border:none;">
							<label>del a&ntilde;o: </label>
						</td>
						<td style="border:none;">
							<select class="form-control" id = "LeInicio" name = "AnioInicio">
								<option value = "2017">2017</option>
							</select>
						</td>
						<td style="border:none;">&nbsp;</td>
						<td style="border:none;">
							<label>del a&ntilde;o: </label>
						</td>
						<td style="border:none;">
							<select class="form-control" id = "LeInicio" name = "AnioFinal">
								<option value = "2017">2017</option>
							</select>
						</td>
					</tr>
					<tr >
						<td style="border:none;">&nbsp;</td>
					</tr>
					<tr>
						<td style="border:none;">
							<label>Vales de Q.50</label><input  type = "radio" name = "Monto" value = "50" />
						</td>
						<td style="border:none;"></td>
						<td style="border:none;">
							<label>Vales de Q.100</label><input  type = "radio" name = "Monto" value = "100" />
						</td>
						<td style="border:none;"></td>
						<td style="border:none;">
							<label>Todos los montos</label><input  type = "radio" name = "Monto" value = "NULL" checked />
						</td>
					</tr>
					<tr>
						<td colspan="7" align="center" style="border:none;">
							<label>
								<input class="btn btn-success" type = "button" id = "Lebotone" value = "Buscar vales" /></label>
						</td>
					</tr>
				</table>
			<div  class="container" >

				<table id="dt" class="table table-striped table-bordered nowrap "  width="50%">
    <thead >
    <tr>
 </tr>
    <tr class="t">
                <th class="th">No. Vale</th>
                <th class="th">Monto Vale Q.</th>
                <th class="th">Cod. Asignación</th>
                <th class="th">Modificar</th>
                <th class="th">Eliminar</th>
                
      
 </tr>

    <??>
      </thead>
      <tbody>
 <?
$query2 = "
select * from tbVale
";              

 //echo "<br><center style='font-size:1.5em'>  VALES</center>";
           
    
$result = sqlsrv_query($conn, $query2);
	
	if($result){
 		
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr id = '". $row['iNo_Vale']. "'>". "<td>". $row['iNo_Vale']. "</td>";
			echo "<td>". $row['ftMonto_Vale']. "</td>";
			if($row['bActivo'] == 1){
				echo "<td> Sin Asignar</td>";
			}
			else
			{
				echo "<td> Vale Asignado</td>";
			}
			echo "<td><i class='fa fa-cog  fa-spin' style='font-size:22px; color:hsl(0, 10%, 60%);'></i></td>";
			echo "<td><i class='fa fa-close' style='font-size:22px;color:hsl(0, 50%, 50%);'></i></td></tr>";
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
    
                
            
?>

        </tbody>
  </table>
</div>
			<div id = "resultado">
				<br>
				<label>Monto total de los vales: </label>
				<input class="form-control" style="border:none;width:25%;" type = "text" id = "Leconte" value = " Q. " readonly/>
			</div>
		</form>
  

  <script>

  $(document).ready(function() {
	var table;
    var d = new Date();
  	var fecha = d.toLocaleDateString('es-CL');
  	var hora = d.toLocaleTimeString('es-CL');
    var totaltotal= null;
    table = $('#dt').DataTable( {

        "pagingType": "full",
        "searching": true,
        "ordering": true,
        "lengthChange": false,
        "autoWidth": false,
        "pageLength": 10,
        "responsive": true,
        "language": {
        "url": "DataTables/json/Spanish.json"    
        },
        "dom": 'Bfrtip',
       	"columnDefs": [
						{
							"targets": [ 3 ],
							"visible": true,
						},
						{
							"targets": [ 4 ],
							"visible": true
						}],
        
         success:function(data){
        	$('#Leconte').val('Q. ' + table.column( 1 ).data().sum());
        },
        "buttons": [



		 $.extend( true, {}, buttonCommon, {
		                 extend: 'excelHtml5',
		                 title: 'Reporte',
		                
		            } ),
		 $.extend( true, {}, buttonCommon, {
                 extend: 'pdfHtml5',                 filename:'Reporte General al ' +fecha,
                message: 'Fecha Impresión: '+fecha+'\nHora Impresión: '+hora+'     ',
                title: 'Vehículos en Reparación',     
            } ),

     {
                extend: 'print',
                text:'Imprimir',
                title:'',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '12pt' )
                        .prepend(
                            '<tr><></td></tr>',
                            '<tr ><td >Fecha: <?php $hoy = date("d/m/Y"); print($hoy); ?></td>',
                            '</tr><tr><td colspan="5" >Hora: <?php $hoy = date("H:m:s"); print($hoy); ?></td>',
                            '</tr></table>',
                            '<center >  Solicitudes</center>'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
         ]
        
    } );


 

	// $('#print_btn').click(function () {
 //          $('#dt').printThis();
 //        });

 var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                    return column === 5 ?
                        data.replace( /[$,]/g, '' ) :
                        data;
                }
            }
        }
    };

	$('#Lebotone').click(function(){

					table.destroy();
					table = null;
					$('#dt').empty();
					$('#Leforme').ajaxSubmit({
						url: 'PHP/ReporteValesPersonalizado.php',
						type: 'POST',
						asinc: false,
						success: function(data){
							$('#dt').append(data);
							table = $('#dt').DataTable({
								"pagingType": "full",
						        "searching": false,
						        "ordering": false,
						        "lengthChange": false,
						        "autoWidth": false,
						        "pageLength": 10,
						        "responsive": false,
								"language": {
									"url": "DataTables/json/Spanish.json" 
								},
								"dom": 'Bfrtip',
							});
							$('#Leconte').val('Q. ' + table.column( 1 ).data().sum());	
						}
					});
				});



 		$('#dt').on('click', '.fa-spin',function(){
					alert('Opcion en contruccion');
				});
} );



</script>


</body>
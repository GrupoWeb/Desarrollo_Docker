<?php 
include("conexion/conexion.php")
 ?>
<body>

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css"/>
    <script type="text/javascript" src="DataTables/datatables.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

<style>
header, footer, nav, aside {
  display: none;
}

.t{
  background: #005588;
  color:white;
  
  
}
.th{
  text-align: center;
  
}


</style>

     <div  >
 <table id="dt" class="table table-striped table-bordered nowrap "  width="50%">
    <thead >
    <tr>
 </tr>
    <tr class="t">
                <th class="th">Placa</th>
                <th class="th">Marca</th>
                <th class="th">Linea</th>
                <th class="th">Modelo</th>
                <th class="th">Piloto</th>
                <th class="th">Cantidad Mantenimiento</th>
      
 </tr>

    <??>
      </thead>
      <tbody>
 <?
$query2 = "
SELECT
	[vh].[idVehiculo],
	[vh].[iPlaca],
	[mr].[strMarca_Vehiculo],
	[md].[strModelo_Vehiculo],
	[ln].[strLinea_Vehiculo],
	[pl].[strPiloto] 
FROM 
	[dbo].[tbVehiculo] AS [vh]
	INNER JOIN [dbo].[tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [vh].[idMarca_Vehiculo] 
	INNER JOIN [dbo].[tbModelo_Vehiculo] AS [md] ON [md].[idModelo_Vehiculo] = [vh].[idModelo_Vehiculo] 
	INNER JOIN [dbo].[tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [vh].[idLinea_Vehiculo] 
	LEFT JOIN [dbo].[tbPiloto] AS [pl] ON [pl].idPiloto = [vh].idPiloto_Asignado 
WHERE
	[vh].[bActivo] = 1
";              

 echo "<br><center style='font-size:1.5em'>  VEHÍCULOS EN MANTENIMIENTO</center>";
           
    
$result = sqlsrv_query($conn, $query2);
	
	if($result)
	{
		$i = 0;
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			$Vehiculos[$i] = $row;
			$i++;
		}
		
		$valida = true;
		for($j = 0; $Vehiculos[$j]; $j++)
		{
			$query = "
			SELECT
				COUNT(*) AS 'Cantidad_Solicitudes'
			FROM 
				[dbo].[tbVehiculo] AS [vh]
				INNER JOIN [dbo].[tbKM_Vehiculo_Servicio] AS [kvs] ON [kvs].[idVehiculo] = [vh].[idVehiculo]
			WHERE 
				[kvs].[idVehiculo] = " . $Vehiculos[$j]['idVehiculo'];
				
				$resultado = sqlsrv_query($conn, $query);
				
				if($resultado)
				{					
					$Cantidad = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
					$Vehiculos[$j]['Cantidad_Solicitudes'] = $Cantidad['Cantidad_Solicitudes'];
				}
				else
				{
					$valida = false;
				}
		}
		
		if($valida == true)
		{
			for($i = 0; $Vehiculos[$i]; $i++)
			{
				echo "
					<tr>
						<td>". $Vehiculos[$i]['iPlaca']."</td>
						<td>". $Vehiculos[$i]['strMarca_Vehiculo']."</td>
						<td>". $Vehiculos[$i]['strLinea_Vehiculo']."</td>
						<td>". $Vehiculos[$i]['strModelo_Vehiculo']."</td>";
				if($Vehiculos[$i]['strPiloto'] != NULL)
				{
					echo "	<td>". $Vehiculos[$i]['strPiloto']."</td>";
				}
				else
				{
					echo "	<td>Vehiculo sin piloto asignado</td>";
				}
			
				echo "	<td>". $Vehiculos[$i]['Cantidad_Solicitudes']."</td>
					</tr>
				";
			}
		}
		else
		{
			echo "<tr><td>Solicitudes no existentes</td></tr>";
		}
	}
	else
	{
		echo "<tr><td>Vehiculos no encontrados</td></tr>";
	}  
    
                
            
?>

        </tbody>

  </table>

  </div>

  <script>


  $(document).ready(function() {

$('#print_btn').click(function () {
          $('#dt').printThis();
        });

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



    var d = new Date();
  var fecha = d.toLocaleDateString('es-CL');
  var hora = d.toLocaleTimeString('es-CL');
    var totaltotal= null;
    $('#dt').DataTable( {

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
        "buttons": [


$.extend( true, {}, buttonCommon, {
                extend: 'excelHtml5',
                title: 'Reporte',
                
            } ),
$.extend( true, {}, buttonCommon, {
                extend: 'pdfHtml5',
                filename:'Reporte General al ' +fecha,
                message: 'Fecha Impresión: '+fecha+'\nHora Impresión: '+hora+'     ',
                title: 'Vehículos en Mantenimiento',     
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
    
    $('#dt_next').click( 'click', function () {
    } ); 
} );



</script>

	</div>
</body>
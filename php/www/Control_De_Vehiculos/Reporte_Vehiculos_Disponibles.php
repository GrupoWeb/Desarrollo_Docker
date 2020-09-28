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
                <th class="th">Piloto Asignado</th>
                <th class="th">Estado</th>
      
 </tr>

    <??>
      </thead>
      <tbody>
 <?
$query2 = "
SELECT 
	[vh].[iPlaca],
	[mr].[strMarca_Vehiculo],
	[mo].[strModelo_Vehiculo],
	[ln].[strLinea_Vehiculo],
	[pl].[strPiloto],
	[ev].[strEstado_Vehiculo] 
FROM
	[dbo].[tbVehiculo] AS [vh]
	INNER JOIN [dbo].[tbBitacora_Estado_Vehiculo] AS [beh] ON [beh].[idVehiculo] = [vh].[idVehiculo] 
	INNER JOIN [dbo].[tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [vh].[idMarca_Vehiculo] 
	INNER JOIN [dbo].[tbModelo_Vehiculo] AS [mo] ON [mo].[idModelo_Vehiculo] = [vh].[idModelo_Vehiculo] 
	INNER JOIN [dbo].[tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [vh].[idLinea_Vehiculo] 
	LEFT JOIN [dbo].[tbPiloto] AS [pl] ON [pl].[idPiloto] = [vh].[idPiloto_Asignado] 
	INNER JOIN [dbo].[tbEstado_Vehiculo] AS [ev] ON [ev].[idEstado_Vehiculo] = [beh].[idEstado_Vehiculo] 
WHERE
	[vh].[bActivo] = 1
	AND [beh].[bActivo] = 1
	AND [beh].[idEstado_Vehiculo] = 1
ORDER BY
	[vh].[iPlaca]
";              

 echo "<br><center style='font-size:1.5em'>  VEHÍCULOS DISPONIBLES</center>";
           
    
                $do = sqlsrv_query($conn, $query2);
                $gt=0;
                $i = 0;                                 
                $tmp = 0;
                $k=array();
                $i = 0;
    
                while($row  = sqlsrv_fetch_array($do, SQLSRV_FETCH_ASSOC))                
                
                {   
                    $err = 0;
                     $i = $i+1;
                               
            
                    echo "<tr><td>". $row['iPlaca']. "</td>";
                    echo "<td>". $row['strMarca_Vehiculo']. "</td>";
                    echo "<td>". $row['strModelo_Vehiculo']. "</td>";
                    echo "<td>". $row['strLinea_Vehiculo']. "</td>";
                    echo "<td>". $row['strPiloto']. "</td>";  
                    echo "<td>". $row['strEstado_Vehiculo']."</td>";   
                     
                    
    

                    
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
                title: 'Reporte General de Inventario',

                

             
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
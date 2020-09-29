
<?php 
include("conexion/conexion.php")
 ?>
<body>

<script type='text/javascript' src="js/jquery.min.js"></script> 
<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
<script type="text/javascript" src="DataTables/datatables.js"></script>
    

<style>
  table {
    border-collapse: collapse;
    background-color: transparent;
  }
  .container table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 12px;    margin: 8px;     width: 100%; text-align: center;    border-collapse: collapse; }

  .container th {     font-size: 14px;     font-weight: normal;     padding: 7px;     
    border-top: 4px solid #D7DBEA;    border-bottom: 1px solid #fff; color: #000; text-align: center }

  .container td {    padding: 15px;     background: #fff;     border-bottom: 1px solid #fff;
      color: #669;    border-top: 1px solid transparent; }
  .container tr:hover td { background: #26A8FA; color: #fff; cursor: pointer;}

</style>

<div  >
 <table  width="80%" >
      <tr>
        <td><div >
          <table  width="100%" >
            <tr>
              <td width="33%"></td>
            </tr>
            <tr >
              <td  >Fecha Impresión: <?php $hoy = date("d/m/Y"); print($hoy); ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5" >Hora de Impresión: <?php $hoy = date("H:m:s"); print($hoy); ?></td>
              <td>&nbsp;</td>
            </tr>
          </table>
          </div></td>
      </tr>
  </table>

     <div class="container " style="width:80%;pisition: relative;   display: inline-block;"  >
 <table id="dt" class="table table-striped table-bordered  "  >
    <thead >
    <tr>
 </tr>
    <tr class="t">
                <th class="bg-blue">No. Solicitud</th>
                <th class="bg-blue">Solicitante</th>
                <th class="bg-blue">Dependencia</th>
                <th class="bg-blue">Fecha Solicitud</th>
                <th class="bg-blue">Hora Solicitud</th>
      
 	</tr>

    
      </thead>
      <tbody>
<?php              


 
$query2 = "
SELECT 
    [sl].[idSolicitud_Vehiculo], 
    ([sol].[nombre1] + ' ' + apellidop) AS Solicitante, 
    [dp].[nombre_dependencia], 
    [sl].[dFecha_Solicitud], 
    [sl].[hHora_Solicitud], 
    [essl].[idEstaod_Solicitud] 
FROM 
    [tbSolicitud_Vehiculo] AS [sl] 
    INNER JOIN [syslogin].[dbo].[Tusuario] AS [sol] ON [sol].[id_usu] = [sl].[idSolicitante]
    INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
    INNER JOIN [tbBitacora_Estado_Solicitud] AS [essl] ON [essl].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
WHERE 
    essl.idEstaod_Solicitud in (1,2,3,4,5,6,7,8,9,10,11) 
    AND essl.bActivo = 1 
    AND sl.bActivo = 1
    order by sl.idSolicitud_Vehiculo desc
";


        echo "<center style='font-size:1.5em'>  REPORTE DE SOLICITUDES</center>";
           
    
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
                               
            
                    echo "<tr class = 'envia' id = '". $row['idSolicitud_Vehiculo']. "' name = '". $row['Solicitante']."'>". "<td>". $row['idSolicitud_Vehiculo']. "</td>";
                    echo "<td>". $row['Solicitante']. "</td>";
                    echo "<td>". $row['nombre_dependencia']. "</td>";
                    echo "<td>". $row['dFecha_Solicitud']->format('d-m-Y'). "</td>";
                    echo "<td>". $row['hHora_Solicitud']->format('H:i'). "</td>";   
                     
                    
    

                    
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
        'destroy': true,
        "pagingType": "full",
        "searching": false,
        "ordering": true,
        "lengthChange": false,
        "autoWidth": false,
        "pageLength": 20,
        "responsive": true,
        "language": {
        'sProcessing':     'Procesando...',
                  'sLengthMenu':     'Mostrar _MENU_ registros',
                  'sZeroRecords':    'No se encontraron resultados',
                  'sEmptyTable':     'Ningún dato disponible en esta tabla',
                  'sInfo':           '',
                  'sInfoEmpty':      'Va de la targeta 0 a la 0 de un total de 0 registros',
                  'sInfoFiltered':   '(filtrado de un total de _PAGES_ registros)',
                  'sInfoPostFix':    '.',
                  'sSearch':         'Buscar:',
                  'sUrl':            '',
                  'sInfoThousands':  ',',
                  'sLoadingRecords': 'Cargando...',
                  'oPaginate': {
                    'sFirst':    'Primero',
                    'sLast':     'Último',
                    'sNext':     'Siguiente',
                    'sPrevious': 'Atrás'
                  },
                  'oAria': {
                    'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                    'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                  }      
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






<body>
      <link rel="stylesheet" href="bootstrap/css/grafico.css" >
      <link rel="stylesheet" href="plugins/select2/select2.min.css">
      <link rel="stylesheet" href="plugins/printarea/jquery.printarea.css">
      <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
      <link rel="stylesheet" type="text/css" href="Date/src/DateTimePicker.css" />
      <script type="text/javascript" src="Date/demo/jquery-1.11.0.min.js"></script>
      <script type="text/javascript" src="Date/src/DateTimePicker.js"></script>
      <link rel="stylesheet" href="dist/css/ionicons.css">
<section class="content">
<br><center style='font-size:1.5em'>  Vehiculos Disponibles </center><br>
  <div class="row">

   <?
   include("conexion/conexion.php");
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

 //echo "<br><center style='font-size:1.5em'>  VEHÍCULOS DISPONIBLES</center>";
           
    
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
                               
                    echo '
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">
                                <h3>'.$row['iPlaca'].'</h3>
                                <p>'.$row['strMarca_Vehiculo'].'  '.$row['strLinea_Vehiculo'].'  '.$row['strModelo_Vehiculo'].'</p>
                              </div>
                              <div class="icon">
                                <i class="ion-android-car"></i>
                              </div>
                              <a href="#" class="small-box-footer">'.$row['strEstado_Vehiculo'].'<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                          </div><!-- ./col -->

                    ';


                    //echo "<tr><td>". $row['iPlaca']. "</td>";
                    //echo "<td>". $row['strMarca_Vehiculo']. "</td>";
                    //echo "<td>". $row['strModelo_Vehiculo']. "</td>";
                    //echo "<td>". $row['strLinea_Vehiculo']. "</td>";
                    //echo "<td>". $row['strPiloto']. "</td>";  
                    //echo "<td>". $row['strEstado_Vehiculo']."</td>";   
                     
                    
    

                    
                }   
    
                
            
?>
          
  </div>
</section>

  <!-- <form>
    <table style="width:80%" >
      <tr>
        <td>
          <table   align="center">
              <tr>
                <td><span style="font-size:40px;">Control de Vehículos</span></td>
              </tr>
        </table>
        <table width="400" style="margin-right: 40px;" align="left">
          <tr>
            <td><center>  <span style="font-size:30px;"> Misión </center></td>
          </tr>
          <br />
          <br />
          <tr>


            <td align="justify"> <span style="font-size:15px;"> 
             
                Promover, divulgar y defender los derechos e intereses de los consumidores y usuarios, 
                fomentando el desarrollo de una cultura de consumo responsable y de conocimiento en el ejercicio de sus derechos.
              </span></td>
          </table>

          <table width="400" style="margin-right: 40px;" align="right">
            <tr>
              <td><center>  <span style="font-size:30px;">Visión </center></td>
            </tr>
            <tr>
             <td align="justify"><span style="font-size:15px;">
               Ser la Institución líder que vele por los derechos e 
               intereses de los consumidores y usuarios, con presencia en los departamentos y municipios del territorio nacional.

             </span>	</td>
           </tr>
         </table>
	</td>
       </tr>
     </table>
   </form> -->
 </body>
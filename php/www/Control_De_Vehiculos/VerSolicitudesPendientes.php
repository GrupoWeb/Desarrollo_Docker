
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
<br><center style='font-size:1.5em'>  Solicitudes Pendientes de Aprobar </center><br>
  <div class="row">

   <?php
   session_start();
   $Usuario = $_SESSION['username'];
   include("conexion/conexion.php");

   if ($Usuario == 11) {

     $query2 = "SELECT 
    [sl].[idSolicitud_Vehiculo], 
    ([sol].[nombre1] + ' ' + apellidop) AS Solicitante, 
    [dp].[nombre_dependencia], 
    [sl].[dFecha_Solicitud], 
    [sl].[hHora_Solicitud], 
    [essl].[idEstaod_Solicitud],
    Solicitud.strEstado_Solicitud
FROM 
    [tbSolicitud_Vehiculo] AS [sl] 
    INNER JOIN [syslogin].[dbo].[Tusuario] AS [sol] ON [sol].[id_usu] = [sl].[idSolicitante]
    INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
    INNER JOIN [tbBitacora_Estado_Solicitud] AS [essl] ON [essl].[idSolicitud] = [sl].[idSolicitud_Vehiculo]
   INNER JOIN [tbEstado_Solicitud] as [Solicitud] ON Solicitud.idEstado_Solicitud =  [essl].[idEstaod_Solicitud]
WHERE 
    essl.idEstaod_Solicitud in (2) 
    AND essl.bActivo = 1 
    AND sl.bActivo = 1";
   }else{

$query2 = "SELECT 
    [sl].[idSolicitud_Vehiculo], 
    ([sol].[nombre1] + ' ' + apellidop) AS Solicitante, 
    [dp].[nombre_dependencia], 
    [sl].[dFecha_Solicitud], 
    [sl].[hHora_Solicitud], 
    [essl].[idEstaod_Solicitud],
    Solicitud.strEstado_Solicitud
FROM 
    [tbSolicitud_Vehiculo] AS [sl] 
    INNER JOIN [syslogin].[dbo].[Tusuario] AS [sol] ON [sol].[id_usu] = [sl].[idSolicitante]
    INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
    INNER JOIN [tbBitacora_Estado_Solicitud] AS [essl] ON [essl].[idSolicitud] = [sl].[idSolicitud_Vehiculo]
   INNER JOIN [tbEstado_Solicitud] as [Solicitud] ON Solicitud.idEstado_Solicitud =  [essl].[idEstaod_Solicitud]
WHERE 
    essl.idEstaod_Solicitud in (2) 
    AND essl.bActivo = 1 
    AND sl.bActivo = 1
    and [sol].[id_usu] = $Usuario;
"; 
   }
             

 //echo "";
           
    
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
                            <div class="small-box bg-blue small-box-footer">
                              <div class="inner">
                                <h3 >'.$row['Solicitante'].'</h3>
                                <p>'.$row['nombre_dependencia'].'  '.$row['dFecha_Solicitud']->format('d-m-Y').'</p>
                              </div>
                              <div class="icon">
                                <i class="ion-android-archive"></i>
                              </div>
                              <a onClick="cargarLoad(this.id,this.name)" class="small-box-footer" name = "'. $row['Solicitante'].'" id="'.$row['idSolicitud_Vehiculo'].'">SOLICITUD '.$row['strEstado_Solicitud'].' <i class="fa fa-thumbs-o-up"></i></a>
                            </div>
                          </div><!-- ./col -->

                    ';
                }   
    
           if ($i <=0) {
             	echo "<br><center style='font-size:1.5em'>  No hay Solicitudes para Aprobar... </center><br>";
             }  
            
?>
          
  </div>

</section>
<script>

  function cargarLoad(solicitud,solicitante){
      var slr = solicitante.split(" ").join("%20");
      $("#cont").load("Aprovacion_Solicitud.php?Solicitud="+solicitud+"&Solicitante="+slr);
    
    }
  </script>
 </body>
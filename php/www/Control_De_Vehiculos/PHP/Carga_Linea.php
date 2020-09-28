<?php
require('../conexion/conexion.php');
$idMarca = $_POST['idMarca'];
$query = "select * from tbLinea_Vehiculo WHERE idMarca_Vehiculo =".$idMarca;
$result = sqlsrv_query($conn,$query);
$error = sqlsrv_errors();
if($result)
{
    
    $i = 1;
    echo $data = "<option value='' disabled selected>--Seleccione una opcion--</option>";
    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        
    {
        echo $data = "<option value='".$row['idLinea_Vehiculo']."'>".$row['strLinea_Vehiculo']."</option>";
        $i++;
    }
    sqlsrv_close($conn);
    }
else
{
    echo   "Error datos no encontrados";
}

?>
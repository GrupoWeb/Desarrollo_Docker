  <? 
  $fecha[0] = "Enero"; 
  $fecha[1] = "Febrero"; 
  $fecha[2] = "Marzo"; 
  $fecha[3] = "Abril"; 
  $fecha[4] = "Mayo"; 
  $fecha[5] = "Junio"; 
  $fecha[6] = "Julio"; 
  $fecha[7] = "Agosto"; 
  $fecha[8] = "Septiembre"; 
  $fecha[9] = "Octubre"; 
  $fecha[10] = "Noviembre"; 
  $fecha[11] = "Diciembre"; 
  
  
        $m = 0;
           for ($x=0; $x<=11; $x++)
        {
         $m++;
         if ($m == date('n'))
         {
          $mes = $fecha[$x];
         }
        }         
    $dia = date('d');
 $anio = date('Y');
 
 print $dia.' de '.$mes.' del '.$anio;?>


<style>
/* Curso CSS estilos aprenderaprogramar.com*/
body {font-family: Arial, Helvetica, sans-serif;}

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 10px;    margin: 8px;     width: 90%; text-align: center;    border-collapse: collapse; }

th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }



#main-header {
    background: white;
    top: 0;
    position: fixed;
	z-index: 1;
}   
    #main-header a {
        color: white;
    }
    
   
   
   
   
#main-content {
    background: white;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
	 position: relative;
	 top:250px;
}

    #main-content header,
    #main-content .content {
        padding: 40px;
    }
    
	
#pie

{
width:auto;
height:12px;


font-size:15px;
font-family:"Segoe UI";
font-style:normal;
font-color:white;
border-top-color:black;
background:#0099FF


}


#pie2

{
	font-size:12px;
	width:800px;
	font-family:"Segoe UI";
	font-style:normal;
	font-color:black;
	border-top-color:#666666;
	background:white;
	color: black;
	right: 300cm;

}
	
	#pie2

{
	font-size:12px;
	width:900px;
	font-family:"Segoe UI";
	font-style:normal;
	font-color:black;
	border-top-color:#666666;
	background:white;
	color: black;
	right: 300cm;

}
	
	
#estilo1{

background:#003399;
width:auto;
height:160px;


}

#tit

{
	font-size:12px;
	width:auto;
	height:80px;
	font-family:"Segoe UI";
	font-style:normal;
	font-color: white;
	border-top-color:black;
	background:#999999;
	color:#FFFFFF;
	right: 300cm;

}


#tit
{
font-size:12px;
font-family:Arial, Helvetica, sans-serif;

}
.Estilo8 {color: #FFFFFF}
.Estilo9 {font-size: 14px}
.Estilo10 {font-size: 16px}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<header id="header" class="info" >
<h2>EXPEDIENTES NO ATENDIDOS </h2>
</header>

<body>

 <table align="center" border="1" bordercolor="#0066FF" >
    <tr>
        <th >No. Expediente</th>
        <th > Fecha</th>
        <th >Hora </th>
        <th>Solicitante </th>
        <th >Usuario que Recibe </th>
        <th>Descripcion </th>
        <th>Ver</th>
      </tr>
<?
		include('../../../conexion/conexion.php');
	    $sql = "select mov.id_movimiento, mov.id_expediente, mov.fecha_traslado, us.nombre, us.apellido, usua.nombre as d, usua.apellido as a , mov.comentarios from movimiento as mov inner join usuario as us
	on us.id_usuario = mov.id_usuario inner join usuario as usua on usua.id_usuario = mov.usuario_recibe  
		where  mov.id_estado=1   order by mov.id_expediente desc";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
  $date = ($row["fecha_traslado"]);
	   
  $ex=($row["id_expediente"]); 
        $t=$ex;     
	
echo "<tr><td width='1%' >".$row["id_expediente"]."</td> ";	   
echo "<td >",date_format ($date,'d-m-y'),"</td> ";
echo "<td>",date_format ($date, 'H:i:s'),"</td> ";
echo "<td>".$row["nombre"]." ".$row["apellido"]."</td> ";
echo "<td>".$row["d"]." ".$row["a"]."</td> ";
echo "<td>".$row["comentarios"]."</td>";
echo "<td> <a href='versolicitud/versolicitud.php?ex=$t' >  <img src='images/lupas.png' width='24' height='22'> </td> </tr>";


}


sqlsrv_free_stmt( $stmt);		
?>
</body>
</html>

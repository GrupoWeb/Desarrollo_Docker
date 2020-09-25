<? 
session_start();

if ($_REQUEST['hd']=='exit')
{
  session_destroy();

 header("location:login.php");
}


?>
<html>
<body bgcolor="#005588">
<head>
   <link rel="stylesheet" type="text/css" href="css/site.css" />
   <script type="text/javascript" src="../js/cssrefresh.js"></script>
</head>

<head> <title> Expediente mineco </title> </head>


		<div id="header">

<iframe src="menu/prut.php" name"true" width="100%" height="5%" marginheight="0%" marginwidth="0%" frameborder="0" style="float:right"">
  </iframe>
  	</div>
	
	<iframe src="inicioblock/informacion.php" name="despliegue" width="100%" height="93.5%" frameborder="0">
</iframe>




</html>


 

		  


		 
	
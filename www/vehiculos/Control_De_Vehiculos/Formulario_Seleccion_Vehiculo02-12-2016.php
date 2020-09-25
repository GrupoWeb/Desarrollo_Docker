<html>
<head>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}

#Vehiculo table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 10px;    margin: 8px;     width: 90%; text-align: center;    border-collapse: collapse; }

#Vehiculo th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

#Vehiculo td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

#Vehiculo tr:hover td { background: #d0dafd; color: #339; }



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
	<script type='text/javascript' src="js/jquery.min.js"></script>
	<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
<title>Buscar Vehiculo</title></head>
<body style="font-family: 'Segoe UI';">
	<form>
		<table id = "Vehiculo" align="center" border="1" bordercolor="#0066FF">
		</table>
		<input type = "hidden" id = "idSolicitud" name = "idSolicitud" value = "<?php echo $_GET['p']; ?>"/>
	</form>
	<script>
			$.ajax({ url: 'PHP/Carga_Vehiculo.php',
         		data: {idSolicitud: $("#idSolicitud").val(), FechaSalida: "<? echo $_GET['fs'];?>", FechaRegreso: "<? echo $_GET['fr']; ?>", HoraSalida: "<? echo $_GET['hs']; ?>", HoraRegreso: "<? echo $_GET['hr']; ?>"},
         		type: 'POST',
				async: false,
         		success: function(data) {
                	$("#Vehiculo").append(data);
					$('#Vehiculo').DataTable({
        				"language": {
			            	"url": "js/Spanish.json"
        				}
					});
               	}
			});
			
			$(document).ready(function(){
                    $(".envia").click(function(){
						var txtMuestra = window.opener.document.getElementById("Vehiculo_Seleccionado");
						var txtVehiculo = window.opener.document.getElementById("idVehiculo");
						txtVehiculo.value = this.id;
						$.ajax({ url: 'PHP/Selecciona_Vehiculo.php',
		         			data: {Placa: this.id},
				         	type: 'POST',
							async: false,
				         	success: function(data) {
								$(txtMuestra).empty();
		                		$(txtMuestra).append(data);
		               		}
						});
						window.close();
					});
                });
				
	</script>
</body>
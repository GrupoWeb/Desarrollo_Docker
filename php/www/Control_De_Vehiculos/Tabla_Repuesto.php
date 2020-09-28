<body>
	<form action="#" method="POST" enctype="multipart/form-data" name="form1" style = " position: relative;  width:80%;  display: inline-block;">
			<div class="container">
  				<h2>Repuesto</h2>
			<table id="Contenido_Solicitud">
			</table>
			<br> 
			</div>
			<div style = "pisition: relative;  width:100%;  display: inline-block;">
			<label id = "Agraga_Contenido" class="Agregar"><i class="fa fa-plus-square" style="font-size:48px;color:hsl(120,60%,50%);">Agregar Repuesto</i></label>
		</div>
		</form>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}

.container table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 10px;    width: 100%; text-align: center;    border-collapse: collapse; }

.container th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

.container td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

.container tr:hover td { background: #d0dafd; color: #339; }

.Agregar{
	cursor: pointer;
}

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
		<script>
			$.ajax({ url: 'PHP/MCarga_Repuesto.php',
        		data: {TipoSolicitud: '2'},
        		type: 'post',
				async: false,
        		success: function(data) {
                    document.getElementById("Contenido_Solicitud").innerHTML = data;
					$('#Contenido_Solicitud').DataTable({
        				"language": {
			            	"url": "js/Spanish.json"
        				}
					});
        		}
			});

			$(document).ready(function(){
				$("#Agraga_Contenido").click(function(){
                    $("#cont").load("Formulario_Ingreso_Repuesto.php");
				});
          	});
		</script>
</body>
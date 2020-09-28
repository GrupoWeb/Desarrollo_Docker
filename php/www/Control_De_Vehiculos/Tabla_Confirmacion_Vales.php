<body>
	<form action="#" method="POST" enctype="multipart/form-data" name="form1" style = " margin-left: -20%; pisition: relative;  width:100%;  display: inline-block;">
			<div class="container" style="width:70%; position: relative;  display: inline-block;">
  				<h2>Confirmacion de recepcion de Vales de Combustible</h2>
			<table id="Contenido_Solicitud" style = "width: 100%; position:relative;">
				<tr>
					<th>Correlativo de Valesz</th>
					<th>Monto Total de Vales</th>
					<th>Confirmado</th>
				</tr>
				<tr class = "ConfirmaVales">
					<td>032--045</td>
					<td>250</td>
					<td><i class='fa fa-check-square' style='font-size:22px;color: hsl(0, 80%, 50%);'></i>
				</tr>
			</table>
			<br> 
			</div>
			<div style="width: 20%; position: relative; top: 0px; margin-left: 5%; display: inline-flex">
				<table>
					<tr>
						<td>
							<i class='fa fa-check-square' style='font-size:45px;color: hsl(0, 80%, 50%);'></i>&nbsp;<label>Vales sin confirmar</label>
						</td>
					</tr>
					<tr>
						<td>
							<i class='fa fa-check-square' style='font-size:45px;color: hsl(120, 60%, 50%);'></i>&nbsp;<label>Vales confirmados</label>
						</td>
					</tr>

				</table>
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
<script>
                $(document).ready(function(){
                    $(".ConfirmaVales").click(function(){
                        $("#cont").load("Formulario_Confirmacion_Vales.php");
					});
                });
        </script>
</body>
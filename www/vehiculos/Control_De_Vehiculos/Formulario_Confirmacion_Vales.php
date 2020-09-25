<body>
	<form>
			<div id="container" style="border: solid 0.5px; width:45%;">
  
  <h1 id="logo" style="background-color: #33CCFF; width:100%;">
<a>&nbsp;</a>
 </h1>

					<h2>Asignacion de vales de gasolina</h2>
				<ul>
                  <li id="foli4" class="notranslate">
                        <label class = "desc" for = "Vehiculo">Vehiculo:<font color="red">**</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label>--Vehiculo seleccionado--</label>
                        </label>
                    </li>
					<li>&nbsp;</li>
					<li>
						<label>KM Actual del vehiculo: ---:--</label>
					</li>
					<li>&nbsp;</li>                    
						<label>Vales: 
							<label>--Vales seleccionados--</label>
						</label>
					<li>&nbsp;</li> 
					 <li id="foli4" class="notranslate">
                        <label class = "desc" for = "Vehiculo">Gasolinera:<font color="red">**</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label>--Gasolinera seleccionada--</label>
                        </label>
                    </li>
					<li>&nbsp;</li>
					<li id="foli4" class="notranslate">
                        <label class = "desc" for = "Vehiculo">Tipo de Gasolina:<font color="red">**</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label>--Tipo de Gasolina--</label>
                        </label>
                    </li>
					<li>&nbsp;</li>
					<li>
						<label>Herramientas:</label>
					</li>
					<li>
						<table width="450" style=" margin-left:10%;">
					<tr>
					  <td width="174"><input type = "checkbox" /><label>Llanta de repuesto</label></td>
						<td width="125"><input type = "checkbox" /><label>Triket y barilla</label></td>
					</tr>
					<tr>
						<td><input type = "checkbox" /><label>Llave de chuchos</label></td>
						<td><input type = "checkbox" /><label>Tarjeta de circulacion</label></td>
					</tr>
					<tr>
						<td><input type = "checkbox" /><label>Extiguidor</label></td>
						<td><input type = "checkbox" /><label>Tri&aacute;ngulo de emergencia</label></td>
					</tr>
			  </table>
					</li>
					<li>&nbsp;</li>
                    <li id="foli4" class="notranslate">
                            <input type = "submit" value = "Enviar formulario"/>
                    </li>
					<li>&nbsp;</li>
                    <div id="pie3"> 
	                    <p><span id="tit" align="center">INGRESO DE SERVICIO PARA EN MANTENIMIENTO DEL VEHICULO MINECO</span> </p>
                   		<p align="center">  &copy; 2016 <a href="http://www.mineco.gob.gt">MINISTERIO DE ECONOMIA</a>	               
				   </div>
                </ul>
           </div>
	</form>
	<style>

.button {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3279a8), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3279a8, #65a9d7);
   background: -moz-linear-gradient(top, #3279a8, #65a9d7);
   background: -ms-linear-gradient(top, #3279a8, #65a9d7);
   background: -o-linear-gradient(top, #3279a8, #65a9d7);
   padding: 9px 18px;
   -webkit-border-radius: 3px;
   -moz-border-radius: 3px;
   border-radius: 3px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 13px;
   font-family: 'Lucida Grande', Helvetica, Arial, Sans-Serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: #28597a;
   background: #28597a;
   color: #ccc;
   }
.button:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }

#pie3

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
.Estilo2 {font-size: 50%}
</style>
<script type="text/javascript">


			$(document).ready(function() {

				var MaxInputs       = 8; //maximum input boxes allowed
				var contenedor   	= $("#contenedor"); //Input boxes wrapper ID
				var AddButton       = $("#agregarCampo"); //Add button ID

				//var x = contenedor.length; //initlal text box count
				var x = $("#contenedor div").length + 1;
				var FieldCount = x-1; //to keep track of text box added

				$(AddButton).click(function (e)  //on add input button click
				{
						if(x <= MaxInputs) //max input box allowed
						{
							FieldCount++; //text box added increment
							//add input box
							$(contenedor).append('<div class="added">Vale&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" id = "Vehiculo" name = "Vehiculo" style = "width: 90%;" placeholder = "Click para buscar Vehiculo" readonly/><a href="#" class="eliminar">&times;</a></div>');
							x++; //text box increment
						}
				return false;
				});

				$("body").on("click",".eliminar", function(e){ //user click on remove text
						if( x > 1 ) {
								$(this).parent('div').remove(); //remove text box
								x--; //decrement textbox
						}
				return false;
				});

			});
		</script>
</body>

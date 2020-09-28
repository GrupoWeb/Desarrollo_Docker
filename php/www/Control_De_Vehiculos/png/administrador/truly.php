<HTML>
<HEAD>
<TITLE>lectura.php</TITLE>
</HEAD>
<BODY>


 <script>
function mostrarOcultarTablas(id){
mostrado=0;
elem = document.getElementById(id);
if(elem.style.display=='block')mostrado=1;
elem.style.display='none';
if(mostrado!=1)elem.style.display='block';
}
</script>

<div id="tabla1" style="display: none">
<table width="200" border="1">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
 
</div>

<div id="tabla2" style="display: none">
<table width="200" border="1">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<a href="javascript:mostrarOcultarTablas('tabla1')">Mostrar tabla 1</a>

<a href="javascript:mostrarOcultarTablas('tabla2')">Mostrar tabla 2</a>
  
   
</BODY>
</HTML>
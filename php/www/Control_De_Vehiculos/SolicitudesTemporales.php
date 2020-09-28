<body>
<script type='text/javascript' src="js/jquery.min.js"></script> 
<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
<!-- 
  
  

  <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> -->


  <style>


  table {
    border-collapse: collapse;
    background-color: transparent;
  }
  .container table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 12px;    margin: 8px;     width: 100%; text-align: center;    border-collapse: collapse; }

  .container th {     font-size: 14px;     font-weight: normal;     padding: 7px;     
    border-top: 4px solid #D7DBEA;    border-bottom: 1px solid #fff; color: #000; text-align: center }

  .container td {    padding: 15px;     background: #fff;     border-bottom: 1px solid #fff;
      color: #669;    border-top: 1px solid transparent; }
  .container tr:hover td { background: #26A8FA; color: #fff; cursor: pointer;}

  </style>

  <div class="container " style="width:80%;pisition: relative;   display: inline-block;"  >
   <table id="ImpresionTemporal" class="table"  >
    <thead>
     <tr class="t">
       <th class="bg-blue">No. Solicitud</th>
       <th class="bg-blue">Solicitante</th>
       <th class="bg-blue">Dependencia</th>
       <th class="bg-blue">Fecha Solicitud</th>
       <th class="bg-blue">Hora Solicitud</th>
     </tr>
   </thead>	  
 </table>
</div>

<!-- 	<pre>
									<?php 
										print_r($_SESSION);
									 ?>
                  </pre> -->
                </body>


                <script>


                $.ajax({url:'PHP/CargaTemporalImpresion.php',
                  data:{},
                  type: 'post',
                  async: false,
                  success: function(data){
                    $("#ImpresionTemporal").append(data);
                    $("#ImpresionTemporal").DataTable({
                     'destroy': true,
                     "pagingType": "full",
                     "searching": true ,
                     "ordering": false,
                     "lengthChange": false,
                     "autoWidth": true,
                     "pageLength": 15,
                     "responsive": true,
                     "language":{
                    "url": "js/Spanish.json"
                  
                    }
                  });
}
});

$(document).ready(function(){
  $("#ImpresionTemporal").on("click",".envia", function(){
    var str = this.id;

    var slr = this.getAttribute("name").split(" ").join("%20");

    $("#cont").load("ImpresionSolicitud.php?Solicitud="+str+"&Solicitante="+slr);

  });
});
</script>

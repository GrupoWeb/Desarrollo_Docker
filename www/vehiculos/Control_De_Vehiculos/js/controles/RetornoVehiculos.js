 $(document).ready(function () {
    MostrarDatos();
})

    function MostrarDatos(){
            var table = $('#Vehiculo').dataTable({
                    'destroy': true,
                    "bDeferRender": true,
                    "searching": true,
                    'pageLength': 5,
                    "blengthChange": false, 'language': {
                        'sProcessing': 'Procesando...',
                        'sLengthMenu': 'Mostrar _MENU_ registros',
                        'sZeroRecords': 'No se encontraron resultados',
                        'sEmptyTable': 'Ningún dato disponible en esta tabla',
                        'sInfo': '',
                        'sInfoEmpty': 'Va de la targeta 0 a la 0 de un total de 0 registros',
                        'sInfoFiltered': '(filtrado de un total de _PAGES_ registros)',
                        'sInfoPostFix': '.',
                        'sSearch': 'Buscar:',
                        'sUrl': '',
                        'sInfoThousands': ',',
                        'sLoadingRecords': 'No hay datos que mostrar....',
                        'oPaginate': {
                            'sFirst': 'Primero',
                            'sLast': 'Último',
                            'sNext': 'Siguiente',
                            'sPrevious': 'Atrás'
                        },
                        'oAria': {
                            'sSortAscending': ': Activar para ordenar la columna de manera ascendente',
                            'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                        }
                    },
                    "sPaginationType":"full_numbers",
                    "ajax": {
                        "url": "PHP/ListarVehiculoMantenimiento.php",
                        "type": "POST" 
                    },
                    "columns": [
                        { "data": "PLACA" ,className:"dataReturn envia"},
                        { "data": "NOMBRE" ,className:"dataReturn envia"},
                        { "data": "PILOTO" ,className:"dataReturn envia"},
                        { "data": "CONTROL" ,className:"dataReturn envia"}                         
                    ]
                });
    }

function returnData(id){
    $("#cont").load("Formulario_Retorno_Servicio.php?idVehiculo=" + id);
}


//  $(document).ready(function () {
//      $("#Vehiculo").on("click", ".envia", function () {
//          var str = this.id;
//          $("#cont").load("Formulario_Retorno_Servicio.php?idVehiculo=" + str);
//      });
//  });
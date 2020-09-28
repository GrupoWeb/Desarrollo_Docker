$(document).ready(function () {
    MostrarDatos();
})

    function MostrarDatos(){
            var table = $('#TMantenimiento').dataTable({
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
                        "url": "PHP/LMantenimiento.php",
                        "type": "POST" 
                    },
                    "columns": [
                        { "data": "PLACA" },
                        { "data": "SALIDA" },
                        { "data": "FECHA_INICIO" },
                        { "data": "LUGAR" },
                        { "data": "TIPO_SERVICIO" },
                        { "data": "MOTIVO" },
                        { "data": "ENVIA_RECIBE" },
                        { "data": "PRINTER"}
                        
                    ],

                    "dom": 'Bfrtip',
                    "buttons": [
                        {
                            extend: 'excelHtml5',
                            title: 'Reporte de Mantenimiento'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Reporte de Mantenimiento',
                            messageTop: 'Reporte Gerencial',
                            
                        }
                    ]
                });
               //obtener_data_printer("#TMantenimiento tbody", table);
    }

function CargarVehiculos() {
            var popup = window.open("Formulario_Seleccion_Vehiculo_Servicio.php", "Envio de Vehiculo a Servio", 'width=1000,height=400');
            popup.focus();
}   

function CargarLugares() {
    var popup = window.open("Formulario_Seleccion_Lugar_Servicio.php", "Envio de Vehiculo a Servio", 'width=1000,height=400');
    popup.focus();
}

function addServicio(formulario){
    $(formulario).submit(function (e) {
        e.preventDefault();
        let parametros = $(this).serialize()
        $.ajax({
            data: parametros,
            url: 'php/Ingreso_Servicio.php',
            type: "post",
            success: function(response){
                if(response){
                    swal({
                        title: "Vehiculo enviado a Servicio",
                        text: "Dato Almacenado!",
                        icon: "success",
                        button: true,
                        dangerMode: true,
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                           $('#cont').load("verSolicitudesPendientes.php");
                        } 
                      });
                                       
                }
            }
        })
       
    })
}

function PrintServicio(id) {
    var printWindow = window.open("Reportes/Rservicio.php?p="+id, 'Print');
    printWindow.focus();
    printWindow.addEventListener('load', function () {
        printWindow.print();
    }, true);
}

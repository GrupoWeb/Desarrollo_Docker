 $(document).ready(function () {
    MostrarDatosR();
})

    function MostrarDatosR(){
            var table = $('#Rvehiculo').dataTable({
                    'destroy': true,
                    "bDeferRender": true,
                    "searching": true,
                    'pageLength': 8,
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
                        "url": "PHP/ListarMantenimiento.php",
                        "type": "POST" 
                    },
                    "columns": [
                        { "data": "ID" ,className:"DMantenimiento"},
                        { "data": "PLACA" ,className:"DMantenimiento"},
                        { "data": "SALIDA" ,className:"DMantenimiento"},
                        { "data": "FECHA_INICIO" ,className:"DMantenimiento"},
                        { "data": "LUGAR" ,className:"DMantenimiento"},
                        { "data": "TIPO_SERVICIO" ,className:"DMantenimiento"},
                        { "data": "MOTIVO" ,className:"DMantenimiento"},
                        { "data": "ENVIA_RECIBE" ,className:"DMantenimiento"},
                        { "data": "PRINTER" ,className:"DMantenimiento"}                        
                    ],
                   "columnDefs": [
                            { "width": "5%", "targets": 0 },
                            { "width": "5%", "targets": 1 },
                            { "width": "8%", "targets": 2 },
                            { "width": "8%", "targets": 3 },
                            { "width": "8%", "targets": 4 },
                            { "width": "8%", "targets": 5 },
                            { "width": "30%", "targets": 6 },
                            { "width": "5%", "targets": 7 },
                            { "width": "5%", "targets": 8 }
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
            
    }

function PrintServicio(id) {
    var id2  = window.btoa(id);
    console.log(id2);
    var printWindow = window.open("Reportes/Rservicio.php?p="+id, 'Print');
    printWindow.focus();
    printWindow.addEventListener('load', function () {
        printWindow.print();
    }, true);
}



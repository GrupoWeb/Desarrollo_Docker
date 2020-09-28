$(document).ready(function () {
    var table = $('#ticket').DataTable({
         "bDeferRender": true,
         "searching": true,
        //"bLengthChange": false,
      
        "sPaginationType": "full_numbers",


        "ajax": {
            "url": "../model/searchTicket.php",
            "type": "POST"

        },
        "columns": [

            { "data": "ID" },
            { "data": "Fecha" },
            { "data": "Estado" },
            { "data": "Report" },
            { "data": "Empleado" },
            { "data": "acciones"}

        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            
            
            if (aData["Estado"] == "Pendiente") {

                
                $("td:eq(2)", nRow).addClass("parpadea");
                //$("td:eq(2)", nRow).addClass("Entregado");
                //$("td:eq(5)", nRow).css("display", "none");
                //$("td:eq(5)", nRow).addClass("ocultar");

            }
            return nRow;
        },
        "search":'',
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Filtrar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Por favor espere - cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });

});


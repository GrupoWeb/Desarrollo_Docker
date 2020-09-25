function CargarData(idvehiculo,table) {
    $.ajax({
        url:'PHP/ListaVehiculoRetorno.php',
        data: {idVehiculo:idvehiculo},
        type: "POST",
        datatype:'json',
        success: function(data){
            let tabla = " \
            <tbody>\
										<tr >\
											<td class='datos'>No. Servicio:</td>\
											<td class='Rdatos'>"+data[0]['ID']+"<input id='idServicio' type= 'hidden' name='idServicio' value='"+data[0]['ID']+"'></td>\
										</tr>\
										<tr>\
											<td class='datos'>Placa:</td>\
											<td class='Rdatos'> "+data[0]['PLACA']+"<input id='idVehiculo' type= 'hidden' name='idVehiculo' value='"+idvehiculo+"'> </td>\
										</tr>\
										<tr>\
											<td class='datos'>Vehiculo:</td>\
											<td class='Rdatos'> "+data[0]['VEHICULO']+" </td>\
										</tr>\
										<tr>\
											<td class='datos'>Fecha Envio:</td>\
											<td class='Rdatos'> "+data[0]['FECHA']+" </td>\
										</tr>\
										<tr>\
											<td class='datos'>Hora Envio:</td>\
											<td class='Rdatos'> "+data[0]['HORA']+" </td>\
                                        </tr>\
                                        <tr>\
											<td class='datos'>Kilometraje Salida:</td>\
											<td class='Rdatos'> "+data[0]['KMSALIDA']+" </td>\
										</tr>\
										<tr>\
											<td class='datos'>Kilometraje Retorno:</td>\
											<td class='Rdatos'><input onkeyup=\"CalculoKilometraje('#idServicio','#KMRegreso','#KMTotal');\" type ='text' id='KMRegreso' name='KMRegreso' class='form-control' required/> </td>\
										</tr>\
										<tr>\
											<td class='datos'>Recorrido:</td>\
											<td class='Rdatos'><label id = 'KMTotal'> --Kilometraje Total-- </label>  </td> \
										</tr>\
									</tbody>";
            $(table).append(tabla);
        }
    })
}	
    
function CalculoKilometraje(id,retorno,recorrido) {
        console.log($(id).val());
        console.log($(retorno).val());
        $.ajax({
            url: 'PHP/SP_KILOMETRO_SERVICIO.php',
            data: {
                idServicio: $(id).val(),
                KMRegreso: $(retorno).val()
            },
            type: 'POST',
            success: function (data) {
                $(recorrido).empty();
                $(recorrido).append(data);
            }

        })
          
}

function RetornoVehiculo(form){
    $(form).submit(function(e){
            e.preventDefault();
            let parametros = $(this).serialize()
            $.ajax({
                data: parametros,
                url: 'php/Retorna_Vehiculo.php',
                type: "post",
                success: function(response){
                    if(response = 'success'){
                        swal({
                            title: "Vehiculo Retornado",
                            text: "Exito!",
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

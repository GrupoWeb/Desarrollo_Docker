            
function cargarDiv(url) {
    $("#contenedor").load(url);
}

function llenarCombos(url,lugar) {
	$.ajax({
		url: url,
		type: 'post',
		success: function (r) {
			$(lugar).empty();
			r = JSON.parse(r);
			sedeItem = crearElemento('option', '__', '__', 'Seleccione...', '__', '__');
			sedeItem.setAttribute('value', '');
			$(lugar).append(sedeItem);
			for (i = 0; i < r.length; i++) {
				option = crearElemento('option', '__', '__', r[i][1], '__', r[i][0]);
				$(lugar).append(option);
			}
		}
	});
}


function llenarCombosID(url, lugar,id) {
	
	var dato = "id="+id;
	$.ajax({
		url: url,
		type: 'post',
		data: dato,
		success: function (r) {
			$(lugar).empty();
			r = JSON.parse(r);
			sedeItem = crearElemento('option', '__', '__', 'Seleccione...', '__', '__');
			sedeItem.setAttribute('value', '');
			$(lugar).append(sedeItem);
			for (i = 0; i < r.length; i++) {
				option = crearElemento('option', '__', '__', r[i][1], '__', r[i][0]);
				$(lugar).append(option);
			}
		}
	});
}

function crearElemento(elemento, identificador, clase, texto, ruta, valor) {
	item = document.createElement(elemento);
	if (identificador !== '__') { item.id = identificador; }
	if (clase !== '__') { item.className = clase; }
	if (texto !== '__') { item.innerText = texto; }
	if (ruta !== '__') { item.dataset.cargarVista = ruta; }
	if (valor !== '__') { item.value = valor; }
	return item;
}

function Historico(url,formulario) {
	$(formulario).submit(function (e) {
		e.preventDefault();
		var datos = $(formulario).serialize();
		console.log(datos);
			$.ajax(
			{
				type: "POST",
				url: url,
				data: datos,
				success: function (event) {
					if (event) {
					$("#reporte").html(event);
					} else {
					
					alert("No existe el reporte");
					}
				}
			})



	})
}


function agregarDatos(user,url,pagina,formulario) {
	$(formulario).submit(function (e) {
		e.preventDefault();
		var usuario = user;
		var datos = "user=" + usuario + "&";
		datos += $(formulario).serialize();
		console.log(datos);

		$.ajax(
			{
				type: "POST",
				url: url,
				data: datos,
				success: function (r) {
					if (r == 1) {
						alert("Agregado con Exito");
						$("#contenedor").load(pagina);
					} else {
						alert("Error");
					}
				}
			})
	})
}

function UploadFile() {
	$('#upload').submit(function (e) {
		e.preventDefault();

		var formData = new FormData($(this)[0]);
		//formData.append("dato","valor");
		$.ajax({
			type: "POST",
			url: "../model/addFileUpload.php",
			data: formData,
			contentType: false,
			processData: false,
			success: function (event) {
				if (event) {
					alert("Dato Ingresado");
					$("#contenedor").load("catalogos/uploadFile.php");
				}else{
					alert("Error al subir archivo");
				}
			}
		})
	})
}



function agregarReporte(url, pagina, formulario, modal) {
	
	$(formulario).submit(function (e) {
		e.preventDefault();
		var datos = $(formulario).serialize();
		console.log(datos);

		$.ajax(
			{
				type: "POST",
				url: url,
				data: datos,
				success: function (r) {
					if (r == 1) {
						alert("Agregado con Exito");
						CierraPopup(modal);
						$("#contenedor").load(pagina);
					} else {
						alert("Error");
					}
				}
			})
	})
}


function deleteReporte(url, pagina, id) {
	
		
		var datos = "id="+id;
		console.log(datos);

		$.ajax(
			{
				type: "POST",
				url: url,
				data: datos,
				success: function (r) {
					if (r == 1) {
						alert("Dato Eliminado");
						
						$("#contenedor").load(pagina);
					} else {
						alert("Error");
					}
				}
			})
	
}


function UpdateReporte(url,modal,pagina,formulario) {
	$(formulario).submit(function (e) {
		e.preventDefault();
		var datos = $(formulario).serialize();
		console.log(datos);
		$.ajax(
		 	{
		 		type: "POST",
		 		url: url,
		 		data: datos,
		 		success: function (r) {
		 			if (r == 1) {
		 				alert("Dato Actualizado");
						CierraPopup(modal);
						location.reload();
						
						
		 			} else {
		 				alert("Error");
		 			}
		 		}
		 	})
	})
}

function UpdatePiloto(url,formulario) {
	$(formulario).submit(function (e) {
		e.preventDefault();
		var datos = $(formulario).serialize();
		console.log(datos);
		$.ajax(
		 	{
		 		type: "POST",
		 		url: url,
		 		data: datos,
		 		success: function (r) {
		 			if (r == 1) {
		 				alert("Dato Actualizado");
						location.reload();
		 			} else {
		 				alert("Error");
		 			}
		 		}
		 	})
	})
}

function UpdatePlaca(url,formulario) {
	$(formulario).submit(function (e) {
		e.preventDefault();
		var datos = $(formulario).serialize();
		console.log(datos);
		$.ajax(
		 	{
		 		type: "POST",
		 		url: url,
		 		data: datos,
		 		success: function (r) {
		 			if (r >= 1) {
		 				alert("Dato Actualizado");
						location.reload();
		 			} else {
		 				alert("Error");
		 			}
		 		}
		 	})
	})
}

function CierraPopup(modal) {
	$(modal).modal('hide');//ocultamos el modal
	$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
	$('.modal-backdrop').remove();//eliminamos el backdrop del modal
}


function print_detalle_existe() {
	$(".printing").printArea();
}

$(document).ready(function () {
	$("#file").on("change",function (e) {
		var files = $(this)[0].files;
		if (files.length >= 2) {
			$("#label_span").text(files.length + " archivos listos para cargar.")
		}else{
			var filename = e.target.value.split('\\').pop();
			var namecomplet = filename.split('.');
			var path = namecomplet.pop();
			console.log(path);
			console.log(namecomplet);
			$('#uploadtitle').val(namecomplet); 
			$("#label_span").text(filename);
		}
	});
});



// var ctx = document.getElementById("myBarChart");
// var myLineChart = new Chart(ctx, {
// 	type: 'bar',
// 	data: {
// 		labels: ["January", "February", "March", "April", "May", "June"],
// 		datasets: [{
// 			label: "Revenue",
// 			backgroundColor: "rgba(2,117,216,1)",
// 			borderColor: "rgba(2,117,216,1)",
// 			//data: [1, 1.5, 2, 2.1, 3, 3.5],
// 			data: [0, 0, 0, 0, 0, 0],
// 		}],
// 	},
// 	options: {
// 		scales: {
// 			xAxes: [{
// 				time: {
// 					unit: 'month'
// 				},
// 				gridLines: {
// 					display: true
// 				},
// 				ticks: {
// 					maxTicksLimit: 6
// 				}
// 			}],
// 			yAxes: [{
// 				ticks: {
// 					min: 0,
// 					max: 4,
// 					maxTicksLimit: 6
// 				},
// 				gridLines: {
// 					display: true
// 				}
// 			}],
// 		},
// 		legend: {
// 			display: true
// 		}
// 	}
// });


//test code
// setInterval(function () {
// 	myLineChart.data.datasets[0].data = [
// 		Math.floor((Math.random() * 3) + 1), Math.floor((Math.random() * 3) + 1),
// 		Math.floor((Math.random() * 3) + 1), Math.floor((Math.random() * 3) + 1), 
// 		Math.floor((Math.random() * 3) + 1), Math.floor((Math.random() * 3) + 1)];
// 	myLineChart.update();

// }, 1500);




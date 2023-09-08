var tabla;

function init() {

	mostrarelformulario(false);
	listar();

	$("#formulario").on("submit", function (e) {

		guardaryeditar(e);
	})
	$("#imagenmuestra").hide();
}

function limpiar() {
	$("#nombre").val("");
    $("#imagenmuestra").attr("src", "");
	$("#imagenactual").val("");
	$("#descripcion").val("");
	$("#cantidad").val("");
	$("#precio").val("");
	
	$("#print").hide();
	$("#Id_producto").val("");

}

function mostrarelformulario(x) {

	limpiar();

	if (x) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();

	} else {
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

function cancelarformulario() {
	limpiar();
	mostrarelformulario(false);
}

function listar() {

	tabla = $('#tablalistado').dataTable(

		{

			"aProcessing": true,//Activamos el procesamiento del datatables
			"aServerSide": true,//Paginación y filtrado realizados por el servidor
			dom: 'Bfrtip',//Definimos los elementos del control de tabla

			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdf'
			],

			"ajax":
			{
				url: '../controllers/productos_calzado.php?op=listar',
				type: "get",
				dataType: "json",
				error: function (e) {
					console.log(e.responseText);
				}
			},

			"bDestroy": true,
			"iDisplayLength": 5,//Paginación
			"order": [[0, "desc"]]//Ordenar (columna,orden)   
		}).DataTable();
}

function guardaryeditar(e) {
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../controllers/productos_calzado.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function (datos) {
			bootbox.alert(datos);
			mostrarelformulario(false);
			tabla.ajax.reload();
		}
	});
	limpiar();
}

function mostrar(Id_producto) {
	$.post("../controllers/productos_calzado.php?op=mostrar", { Id_producto: Id_producto }, function (data, status) {
		data = JSON.parse(data);
		mostrarelformulario(true);

		$("#nombre").val(data.Nombre);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src", "../files/productos_calzado/" + data.Imagen);
		$("#imagenactual").val(data.Imagen);
        $("#descripcion").val(data.Descripcion);
        $("#cantidad").val(data.Cantidad);
        $("#precio").val(data.Precio);

		$("#Id_producto").val(data.Id_producto);
		//generarbarcode();
	})
}

function eliminar(Id_producto) {

	bootbox.confirm("¿Está Seguro de Eliminar el producto?", function (result) {

		if (result) {

			$.post("../controllers/productos_calzado.php?op=eliminar", { Id_producto: Id_producto }, function (e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


init();
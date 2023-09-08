var tabla;

function init() {
    mostrarelformulario(false);
    listar();

    $("#formulario").on("submit", function (e) {
        
        guardaryeditar(e);
    })


	//Mostramos los permisos
	$.post("../controllers/usuarios.php?op=id=",function(r){
	        
	});
}

function limpiar() {

  	$("#usuario").val("");
  	$("#nombre").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#tipo_usuario").val("");
	$("#password").val("");
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
					url: '../controllers/usuarios.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
            },

        "bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)   
    }).DataTable();
}

function guardaryeditar(e) {

    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    	$.ajax({
		url: "../controllers/usuarios.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,
	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarelformulario(false);
	          tabla.ajax.reload();
	    }
        });
    limpiar();
}

function mostrar(Id_usuario) {
    $.post("../controllers/usuarios.php?op=mostrar", { Id_usuario: Id_usuario }, function (data, status) {

        data = JSON.parse(data);
        mostrarelformulario(true);

        $("#usuario").val(data.Usuario);
        $("#nombre").val(data.Nombre);
        
        console.log(data);

        $("#direccion").val(data.Direccion);
        $("#telefono").val(data.Telefono);
        $("#tipo_usuario").val(data.Tipo_usuario);
        $("#password").val(data.Password);

		$("#Id_usuario").val(data.Id_usuario);
            
    });

}

//Función para desactivar registros
function desactivar(idusuario)
{
	bootbox.confirm("¿Está Seguro de desactivar el usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuarios.php?op=desactivar", {idusuario : idusuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();
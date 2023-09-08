<?php 
require_once "../models/producto_hombre.php";

$producto_hombre =new Producto_hombre();

$id_producto=isset($_POST["Id_producto"])? limpiarCadena($_POST["Id_producto"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':

		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/productos_hombre/" . $imagen);
			}
		}
        
		if (empty($id_producto)){
			$rspta=$producto_hombre->insertar($nombre,$imagen, $descripcion, $cantidad, $precio);
			echo $rspta ? "Producto registrado" : "Producto no se pudo registrar";
		}
		else {
			$rspta=$producto_hombre->editar($id_producto,$nombre,$imagen, $descripcion, $cantidad, $precio);
			echo $rspta ? "Producto actualizado" : "Producto no se pudo actualizar";
		}
	break;

	case 'eliminar':
		$rspta=$producto_hombre->eliminar($id_producto);
 		echo $rspta ? "Artículo Eliminado" : "Artículo no se puede Eliminar";
 		break;
	break;

	case 'activar':
		$rspta=$articulo->activar($idarticulo);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$producto_hombre->mostrar($id_producto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$producto_hombre->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=> '<button class="btn btn-warning" onclick="mostrar('.$reg->Id_producto.')"><i class="fas fa-pencil-alt"></i></button>'.
                 ' <button class="btn btn-danger" onclick="eliminar('.$reg->Id_producto.')"><i class="fas fa-times"></i></button>',
 				"1"=>$reg->Nombre,
                "2"=>"<img src='../files/productos_hombre/".$reg->Imagen."' height='50px' width='50px' >",
 				"3"=>$reg->Descripcion,
 				"4"=>$reg->Cantidad,
 				"5"=>$reg->Precio,
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

}
?>
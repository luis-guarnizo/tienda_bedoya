<?php 
require_once "../models/producto_infantil.php";

$producto_infantil =new Producto_infantil();

$id_producto=isset($_POST["Id_producto"])? limpiarCadena($_POST["Id_producto"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";



switch ($_GET["op"]){

	case 'activar':
		$rspta=$articulo->activar($idarticulo);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
 		break;
	break;

	case 'agregar':
		$rspta=$producto_infantil->mostrar($id_producto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$producto_infantil->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=> '<button class="btn btn-warning" onclick="agregar('.$reg->Id_producto.')"><i class="fas fa-pencil-alt"></i></button>'.
                 ' <button class="btn btn-danger" onclick="eliminar('.$reg->Id_producto.')"><i class="fas fa-times"></i></button>',
 				"1"=>$reg->Nombre,
                "2"=>"<img src='../files/productos_infantil/".$reg->Imagen."' height='50px' width='50px' >",
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
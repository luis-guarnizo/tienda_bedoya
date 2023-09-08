<?php
session_start();  
require_once "../models/usuario.php";

$usuario=new Usuario();

$id_usuario=isset($_POST["Id_usuario"])? limpiarCadena($_POST["Id_usuario"]):"";
$username=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$tipo_usuario=isset($_POST["tipo_usuario"])? limpiarCadena($_POST["tipo_usuario"]):"";
$password=isset($_POST["password"])? limpiarCadena($_POST["password"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

        $passwordhash=hash("SHA256",$password);
    
		if (empty($id_usuario)){
			$rspta=$usuario->insertar($username, $nombre, $direccion,$telefono,$tipo_usuario,$passwordhash);
			echo $rspta ? "usuario registrado" : "la usuario no se pudo registrar";
		}
		else {
			$rspta=$usuario->editar($id_usuario,$username, $nombre,$direccion,$telefono,$tipo_usuario, $password);
			echo $rspta ? "usuario actualizado" : "usuario no se pudo actualizar";
		}
	break;

    case 'desactivar':
		$rspta=$usuario->desactivar($Id_usuario);
 		echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
	break;

	case 'activar':
		$rspta=$usuario->activar($Id_usuario);
 		echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
	break;

	case 'mostrar':
		$rspta=$usuario->mostrar($id_usuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->Id_usuario.')"><i class="fas fa-pencil-alt"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->Id_usuario.')"><i class="fas fa-times"></i></button>',
 					
 				"1"=>$reg->Usuario,
 				"2"=>$reg->Nombre,
 				"3"=>$reg->Direccion,
 				"4"=>$reg->Telefono,
                "5"=>$reg->Tipo_usuario,
                "6"=>$reg->Password,
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;


    case 'verificar':

        $username=$_POST['usuario'];
	    $password=$_POST['password'];

        $passwordhash=hash("SHA256",$password);

        $rspta=$usuario->verificar($username, $passwordhash);

        $fetch=$rspta->fetch_object();

        if(isset($fetch)){

            $_SESSION['Id_usuario']=$fetch->Id_usuario;
	        $_SESSION['usuario']=$fetch->Usuario;
	        $_SESSION['nombre']=$fetch->Nombre;
	        $_SESSION['tipo_usuario']=$fetch->Tipo_usuario;

            ($fetch->Id_usuario);

        }
        echo json_encode($fetch);
    break;
}
?>
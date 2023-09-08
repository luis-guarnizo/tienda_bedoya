<?php 
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conection.php";

Class Producto_mujer
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$imagen, $descripcion, $cantidad, $precio)
	{
		$sql="INSERT INTO bedoya_productos_mujer (Id_producto, Nombre, Imagen, Descripcion, Cantidad, Precio)
		VALUES ('', '$nombre', '$imagen', '$descripcion', '$cantidad', '$precio')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($Id_producto,$nombre,$imagen, $descripcion, $cantidad, $precio)
	{
		$sql="UPDATE bedoya_productos_mujer SET Nombre='$nombre',
        Imagen='$imagen', 
        Descripcion='$descripcion',
        Cantidad='$cantidad',
        Precio='$precio' 
        WHERE Id_producto='$Id_producto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function eliminar($Id_producto){
		$sql="DELETE FROM `bedoya_productos_mujer` WHERE Id_producto='$Id_producto'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($Id_producto)
	{
		$sql="SELECT * FROM bedoya_productos_mujer WHERE Id_producto='$Id_producto'";
		return ejecutarConsultaUnica($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
    {
        $sql = "SELECT * FROM bedoya_productos_mujer";
        return ejecutarConsulta($sql);
    }
}

?>
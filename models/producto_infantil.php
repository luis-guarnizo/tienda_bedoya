<?php
//Incluímos inicialmente la conexión a la base de datos
require_once "../config/Conection.php";

class Producto_infantil
{
	//Implementamos nuestro constructor
	public function __construct()
	{
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre, $imagen, $descripcion, $cantidad, $precio)
	{
		$sql = "INSERT INTO bedoya_productos_infantil (Id_producto, Nombre, Imagen, Descripcion, Cantidad, Precio)
		VALUES ('', '$nombre', '$imagen', '$descripcion', '$cantidad', '$precio')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($Id_producto, $nombre, $imagen, $descripcion, $cantidad, $precio)
	{
		$sql = "UPDATE bedoya_productos_infantil SET Nombre='$nombre',
        Imagen='$imagen', 
        Descripcion='$descripcion',
        Cantidad='$cantidad',
        Precio='$precio' 
        WHERE Id_producto='$Id_producto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function eliminar($Id_producto)
	{
		$sql = "DELETE FROM `bedoya_productos_infantil` WHERE Id_producto='$Id_producto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idarticulo)
	{
		$sql = "UPDATE articulo SET condicion='1' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($Id_producto)
	{
		$sql = "SELECT * FROM bedoya_productos_infantil WHERE Id_producto='$Id_producto'";
		return ejecutarConsultaUnica($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function agregar($Id_producto)
	{
		$sql = "SELECT * FROM bedoya_productos_infantil WHERE Id_producto='$Id_producto'";
		$producto = ejecutarConsultaUnica($sql);
		// Usando print_r para imprimir el array completo
		echo "Array de Producto:" . PHP_EOL;
		print_r($producto);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql = "SELECT * FROM bedoya_productos_infantil";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function compra_listar()
	{
		$sql = "SELECT * FROM bedoya_productos_infantil";
		return ejecutarConsulta($sql);
	}
}

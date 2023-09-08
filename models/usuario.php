<?php


require_once "../config/Conection.php";


class Usuario
{

    public  function __contruct()
    {
    }

    public function insertar($username, $nombre,  $direccion, $telefono, $tipo_usuario, $password)
    {

        $sql = "INSERT INTO bedoya_usuarios(Usuario,Nombre,Direccion,Telefono,Tipo_usuario, Password) VALUES('$username','$nombre','$direccion','$telefono', '$tipo_usuario','$password')";
        //return ejecutarConsulta($sql);
        return ejecutarConsultaRetornarID($sql);

    }

    public function editar($Id_usuario, $username, $nombre,  $direccion, $telefono, $tipo_usuario, $password)
    {

        $sql = "UPDATE bedoya_usuarios SET Usuario='$username', 
        Nombre='$nombre', 
        Direccion='$direccion', 
        Telefono='$telefono',
        Tipo_usuario='$tipo_usuario',
        Password='$password'
        WHERE Id_usuario='$Id_usuario'";
        
        return ejecutarConsulta($sql);
    }

    public function desactivar($idusuario)
    {
        $sql = "UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function activar($idusuario)
    {
        $sql = "UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($Id_usuario)
    {
        $sql = "SELECT * FROM bedoya_usuarios WHERE Id_usuario='$Id_usuario'";
        return ejecutarConsultaUnica($sql);
    }

    public function listar()
    {
        $sql = "SELECT * FROM bedoya_usuarios";
        return ejecutarConsulta($sql);
    }

    
    //Función para verificar el acceso al sistema
    public function verificar($usuario, $password)
    {
        $sql = "SELECT Id_usuario, Usuario, Nombre, Direccion,Telefono, Tipo_usuario  FROM bedoya_usuarios WHERE Usuario='$usuario' AND Password='$password'";
        return ejecutarConsulta($sql);
    }
}

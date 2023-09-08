<?php
    require_once "global.php";

    //conexion a la db 
    $connection =  new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


    mysqli_query($connection, 'SET NAMES "'.DB_ENCODE.'"');

    if(mysqli_connect_errno()) {
        printf("Falló conexión a la DB: %s\n", mysqli_connect_errno());
        exit();
    }

    function ejecutarConsulta($sql){
        global $connection;
        //envia la consula a la base de datos
        $query = $connection->query($sql);
        return $query;
    }


    function ejecutarConsultaUnica($sql){
        global $connection;
        $query = $connection->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    function ejecutarConsultaRetornarID($sql){
        global $connection;
        $query = $connection->query($sql);
        return $connection->insert_id;
    }

    function limpiarCadena($str){
        global $connection;
        //eliminar espacios en blanco en los datos ingresados por el usuario
        $str = mysqli_real_escape_string($connection, trim($str));
        return htmlspecialchars($str);
    }
?>
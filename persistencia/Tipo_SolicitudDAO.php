<?php
class Tipo_SolicitudDAO{
    
    private $id;
    private $nombre;
    
    function Tipo_SolicitudDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    
    function registrar(){
        return "INSERT INTO tipo_Solicitud (nombre)
                VALUES ('" . $this -> nombre . "')";
    }
    
    function consultar(){
        return "SELECT idtipo_Solicitud
                FROM tipo_Solicitud
                WHERE nombre='" . $this -> nombre."'";
    }
    
    
    function consultarTodos(){
        return "SELECT idtipo_Solicitud, nombre
                FROM tipo_Solicitud";
    }
}

?>
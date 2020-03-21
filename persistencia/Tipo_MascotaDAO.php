<?php
class Tipo_MascotaDAO{
    
    private $id;
    private $nombre;
    
    function Tipo_MascotaDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    
    function registrar(){
        return "INSERT INTO tipo_mascota (nombre)
                VALUES ('" . $this -> nombre . "')";
    }
    
    function consultar(){
        return "SELECT idtipo_mascota
                FROM tipo_mascota
                WHERE nombre='" . $this -> nombre."'";
    }
   
    
    function consultarTodos(){
        return "SELECT idtipo_mascota, nombre
                FROM tipo_mascota";
    }
}

?>
<?php
class EspecialidadDAO{
    
    private $id;
    private $nombre;
    
    function EspecialidadDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    
    function registrar(){
        return "INSERT INTO especialidad (nombre)
                VALUES ('" . $this -> nombre . "')";
    }
    
    function consultar(){
        return "SELECT idespecialidad
                FROM especialidad
                WHERE nombre='" . $this -> nombre."'";
    }
   
    
    function consultarTodos(){
        return "SELECT idespecialidad, nombre
                FROM especialidad";
    }
}

?>
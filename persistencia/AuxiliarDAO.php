<?php
class AuxiliarDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    
    function AuxiliarDAO($id="", $nombre="", $apellido="", $correo="", $clave=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }
    
    function registrar(){
        return "INSERT INTO auxiliar (nombre, apellido, correo, clave)
                VALUES ('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'))";
    }
    
    function autenticar(){
        return "SELECT id_auxiliar
                FROM auxiliar
                WHERE correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function consultar(){
        return "SELECT nombre, apellido, correo
                FROM auxiliar
                WHERE id_cliente =" . $this -> id;
    }
    
    function existeCorreo(){
        return "SELECT id_auxiliar
                FROM auxiliar
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT id_auxiliar, nombre, apellido, correo
                FROM auxiliar";
    }
}


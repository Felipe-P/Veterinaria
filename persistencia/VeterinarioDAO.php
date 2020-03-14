<?php
class VeterinarioDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $especialidad;
    
    function VeterinarioDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $especialidad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> especialidad = $especialidad;
    }
    
    function registrar(){
        return "INSERT INTO veterinario (nombre, apellido, correo, clave, especialidad)
                VALUES ('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> especialidad . "')";
    }
    
    function autenticar(){
        return "SELECT id_cliente
                FROM veterinario
                WHERE correo = '" . $this -> correo . "' and clave = md5('" . $this -> especialidad . "')";
    }
    
    function consultar(){
        return "SELECT nombre, apellido, correo, especialidad
                FROM veterinario
                WHERE id_veterinario =" . $this -> id;
    }
    
    function existeCorreo(){
        return "SELECT id_veterinario
                FROM veterinario
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT id_veterinario, nombre, apellido, correo, especialidad
                FROM veterinario";
    }
}


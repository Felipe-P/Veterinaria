<?php
class VeterinarioDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $especialidad;
    private $disponible;
    
    function VeterinarioDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $especialidad="", $disponible=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> especialidad = $especialidad;
        $this -> disponible = $disponible;
    }
    
    function actualizar(){
        return "update veterinario set
                nombre = '" . $this -> nombre . "',
                apellido='" . $this -> apellido . "',
                especialidad =" . $this -> especialidad . "
                where idveterinario=" . $this -> id;
    }
    
    
    function registrar(){
        return "INSERT INTO veterinario (nombre, apellido, correo, clave, especialidad)
                VALUES ('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> especialidad . "')";
    }
    
    function filtrar($filtro){
        return "SELECT  DISTINCT idveterinario, v.nombre, apellido, correo, e.nombre, disponible 
                FROM veterinario v, especialidad e
                where especialidad=idespecialidad and v.nombre like '%".$filtro."%'
                order by apellido";
    }
    function autenticar(){
        return "SELECT idveterinario
                FROM veterinario
                WHERE correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function consultar(){
        return "SELECT v.nombre, apellido, correo, e.nombre, disponible
                FROM veterinario v, especialidad e
                WHERE idveterinario =" . $this -> id ." and especialidad=idespecialidad";
    }
    
    function existeCorreo(){
        return "SELECT idveterinario
                FROM veterinario
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT DISTINCT idveterinario, v.nombre, apellido, correo, e.nombre, disponible
                FROM veterinario v, especialidad e
                WHERE especialidad=idespecialidad";
    }
}


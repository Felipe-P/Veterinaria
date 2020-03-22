<?php
class AuxiliarDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $disponibilidad;
    
    function AuxiliarDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $disponibilidad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> disponibilidad = $disponibilidad;
    }
    
    function registrar(){
        return "INSERT INTO auxiliar (nombre, apellido, correo, clave)
                VALUES ('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'))";
    }
    
    function actualizar(){
        return "update auxiliar set
                nombre = '" . $this -> nombre . "',
                apellido='" . $this -> apellido . "',
                where idauxiliar=" . $this -> id;
    }
    
    function autenticar(){
        return "SELECT idauxiliar
                FROM auxiliar
                WHERE correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function consultar(){
        return "SELECT nombre, apellido, correo, disponibilidad
                FROM auxiliar
                WHERE idauxiliar =" . $this -> id;
    }
    
    function existeCorreo(){
        return "SELECT idauxiliar
                FROM auxiliar
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT idauxiliar, nombre, apellido, correo, disponibilidad
                FROM auxiliar";
    }
    
    function filtrar($filtro){
        return "SELECT idauxiliar ,nombre, apellido, correo, disponibilidad
                FROM auxiliar
                WHERE nombre LIKE '%".$filtro."%'
                    OR apellido LIKE '%".$filtro."%' OR CONCAT(nombre, ' ', apellido) LIKE '%".$filtro."%'
                ORDER by apellido";
    }
}


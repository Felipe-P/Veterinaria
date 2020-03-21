<?php
class AuxiliarDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $disponible;
    
    function AuxiliarDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $disponible=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> disponible= $disponible;
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
    function filtrar($filtro){
        return "select idauxiliar ,nombre, apellido, correo, disponible
                from auxiliar
                where nombre like '%".$filtro."%'
                    or apellido like '%".$filtro."%'
                order by apellido";
    }
    function autenticar(){
        return "SELECT idauxiliar
                FROM auxiliar
                WHERE correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function consultar(){
        return "SELECT nombre, apellido, correo, disponible
                FROM auxiliar
                WHERE idauxiliar =" . $this -> id;
    }
    
    function existeCorreo(){
        return "SELECT idauxiliar
                FROM auxiliar
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT idauxiliar, nombre, apellido, correo, disponible
                FROM auxiliar";
    }
}


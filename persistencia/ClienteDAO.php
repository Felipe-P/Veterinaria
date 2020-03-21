<?php
class ClienteDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $cedula;
    
    function ClienteDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $cedula=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> cedula = $cedula;
    }
    
    function registrar(){
        return "INSERT INTO cliente (nombre, apellido, correo, clave, cedula)
                VALUES ('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> cedula . "')";
    }
    
    function autenticar(){
        return "SELECT idcliente 
                FROM cliente
                WHERE correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    function actualizar(){
        return "update cliente set
                nombre = '" . $this -> nombre . "',
                apellido='" . $this -> apellido . "',
                cedula ='" . $this -> cedula . "',
                where idcliente=" . $this -> id;
    }
    
    function filtrar($filtro){
        return "select idcliente,nombre, apellido, correo, cedula
                from cliente
                where nombre like '%".$filtro."%'
                    or apellido like '%".$filtro."%'
                order by apellido";
    }
    function consultar(){
        return "SELECT nombre, apellido, correo, cedula
                FROM cliente
                WHERE idcliente =" . $this -> id;
    }
    
    function existeCorreo(){
        return "SELECT idcliente 
                FROM cliente
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT idcliente, nombre, apellido, correo, cedula
                FROM cliente";
    }
}


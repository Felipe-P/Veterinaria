<?php
class VeterinarioDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $especialidad;
    private $disponibilidad;
    
    function VeterinarioDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $especialidad="", $disponibilidad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> especialidad = $especialidad;
        $this -> disponibilidad = $disponibilidad;
    }
    function consultarCantidadVeterinario(){
        return "SELECT count(idsolicitud)
                FROM veterinario v, especialidad e, solicitud
                where especialidad=idespecialidad and veterinario_idveterinario=idveterinario and e.nombre!='General'";
    }
    function consultarCantidadVeterinarioGeneral(){
        return "SELECT count(idsolicitud)
                FROM veterinario v, especialidad e, solicitud
                where especialidad=idespecialidad and veterinario_idveterinario=idveterinario and e.nombre='General'";
    }
    function actualizar(){
        return "update veterinario set
                nombre = '" . $this -> nombre . "',
                apellido='" . $this -> apellido . "',
                especialidad =" . $this -> especialidad . "
                where idveterinario=" . $this -> id;
    }
    function actualizarDisponibilidad(){
        return "update veterinario set
                disponibilidad =" . $this -> disponibilidad . "
                where idveterinario=" . $this -> id;
    }
    function registrar(){
        return "INSERT INTO veterinario (nombre, apellido, correo, clave, especialidad)
                VALUES ('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> especialidad . "')";
    }
    
    function filtrar($filtro){
        return "SELECT  DISTINCT idveterinario, v.nombre, apellido, correo, e.nombre, disponibilidad 
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
        return "SELECT v.nombre, apellido, correo, e.nombre, disponibilidad
                FROM veterinario v, especialidad e
                WHERE idveterinario =" . $this -> id ." and especialidad=idespecialidad";
    }
    
    function existeCorreo(){
        return "SELECT idveterinario
                FROM veterinario
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT DISTINCT idveterinario, v.nombre, apellido, correo, e.nombre, disponibilidad
                FROM veterinario v, especialidad e
                WHERE especialidad = idespecialidad";
    }
    function ConsultarDisponiblesTipo($tipo){
        return "SELECT DISTINCT idveterinario, v.nombre, apellido, correo, e.nombre, disponibilidad
                FROM veterinario v, especialidad e
                WHERE especialidad = idespecialidad and e.nombre='". $tipo ."' and disponibilidad=0";
    }
    function losMasTrabajadores(){
        return "SELECT nombre, apellido, count(idsolicitud) FROM veterinario , solicitud WHERE idveterinario=veterinario_idveterinario group by veterinario_idveterinario having count(idsolicitud)>=1";
    }
}


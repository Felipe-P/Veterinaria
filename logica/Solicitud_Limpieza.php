<?php
require 'persistencia/Solicitud_LimpiezDAO.php';
require_once 'persistencia/Conexion.php';

class Solicitud_Limpieza {
    private $idSolicitud;
    private $idlimpieza;
    private $idAuxiliar;
    private $Solicitud_LimpiezaDAO;
    private $conexion;
    
    function getIdSolicitud(){
        return $this -> idSolicitud;
    }
    function getIdLimpieza(){
        return $this -> idlimpieza;
    }
    
    function getIdAuxiliar(){
        return $this -> idAuxiliar;
    }
    
    function Solicitud_Limpieza($idSolicitud="", $idlimpieza="",$idAuxiliar=""){
        $this -> idSolicitud = $idSolicitud;
        $this -> idlimpieza = $idlimpieza;
        $this -> idAuxiliar = $idAuxiliar;
        $this -> conexion = new Conexion();
        $this -> Solicitud_LimpiezaDAO = new Solicitud_LimpiezaDAO($idSolicitud, $idlimpieza,$idAuxiliar);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> Solicitud_LimpiezaDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function ModificarAuxiliar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> Solicitud_LimpiezaDAO -> ModificarAuxiliar());
        $this -> conexion -> cerrar();
    }
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> Solicitud_LimpiezaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> idlimpieza= $resultado[0];
        $this -> idAuxiliar = $resultado[1];
        $this -> conexion -> cerrar();
    }
    function consultarParaModal(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> Solicitud_LimpiezaDAO -> consultarParaModal());
        $resultado = $this -> conexion -> extraer();
        $this -> idlimpieza= $resultado[0];
        $this -> idAuxiliar = $resultado[1]." ".$resultado[2];
        $this -> conexion -> cerrar(); 
    }
    function consultartipo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> Solicitud_LimpiezaDAO -> consultartipo());
        $resultado = $this -> conexion -> extraer();
        $this -> conexion -> cerrar();
        return $resultado[0];
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> Solicitud_LimpiezaDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud_Limpieza($registro[0],$registro[1], $registro[2]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarSolicitudes(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> Solicitud_LimpiezaDAO -> consultarSolicitudes());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud_Limpieza($registro[0],$registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}
?>
<?php
require 'persistencia/TipoMascotaDAO.php';
require_once 'persistencia/Conexion.php';

class tipoMascota {
    private $id;
    private $nombre;
    private $TipomascotaDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function tipoMascota($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> TipomascotaDAO = new TipoMascotaDAO($id, $nombre);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> TipomascotaDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> TipomascotaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> TipomascotaDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Tipomascota($registro[0],$registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}
?>
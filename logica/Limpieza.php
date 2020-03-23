<?php
require 'persistencia/LimpiezaDAO.php';
require_once 'persistencia/Conexion.php';

class Limpieza {
    private $id;
    private $tipo;
    private $LimpiezaDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getTipo(){
        return $this -> tipo;
    }
    
    function Limpieza($id="", $tipo=""){
        $this -> id = $id;
        $this -> tipo = $tipo;
        $this -> conexion = new Conexion();
        $this -> LimpiezaDAO = new LimpiezaDAO($id, $tipo);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> LimpiezaDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function autenticar($mascota){
        $this -> conexion -> abrir();
        $cont=0;
        $this -> conexion -> ejecutar($this -> LimpiezaDAO -> autenticar($mascota));
        while (($registro = $this -> conexion -> extraer()) != null) {
        if($registro[0]==0){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $cont++;
        }
        }
        if($cont!=0){
            $this -> conexion -> cerrar();
            return false;
        }
        
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> LimpiezaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> LimpiezaDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Limpieza($registro[0],$registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}
?>
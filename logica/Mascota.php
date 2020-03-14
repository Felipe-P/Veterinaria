<?php
require 'persistencia/MascotaDAO.php';
require_once 'persistencia/Conexion.php';

class Mascota {
    private $id;
    private $nombre;
    private $sexo;
    private $peso;
    private $f_nacimiento;
    private $cliente;
    private $tipo;
    private $MascotaDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getSexo(){
        return $this -> sexo;
    }
    
    function getPeso(){
        return $this -> peso;
    }
    
    function getF_nacimiento(){
        return $this -> f_nacimiento;
    }
    
    function getCodigo(){
        return $this -> codigo;
    }
    
    function getCliente(){
        return $this -> cliente;
    }
    
    function getTipo(){
        return $this -> tipo;
    }
    
    function Cliente($id="", $nombre="", $sexo="", $peso="", $f_nacimiento="", $codigo="", $cliente="", $tipo=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> sexo = $sexo;
        $this -> peso = $peso;
        $this -> f_nacimiento = $f_nacimiento;
        $this -> codigo = $codigo;
        $this -> cliente = $cliente;
        $this -> tipo = $tipo;
        $this -> conexion = new Conexion();
        $this -> mascotaDAO = new MascotaDAO($id, $nombre, $sexo, $peso, $f_nacimiento, $codigo, $cliente, $tipo);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> mascotaDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> mascotaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> sexo = $resultado[1];
        $this -> peso = $resultado[2];
        $this -> f_nacimiento = $resultado[3];
        $this -> codigo = $resultado[4];
        $this -> conexion -> cerrar();
    }
    
    function existeCodigo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> mascotaDAO -> existeCodigo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;
        }
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> mascotaDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Mascota($registro[0],$registro[1],$registro[2],$registro[3], $registro[4], $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}
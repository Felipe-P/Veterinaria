<?php
class MascotaDAO{
    
    private $id;
    private $nombre;
    private $sexo;
    private $peso;
    private $f_nacimiento;
    private $codigo;
    private $cliente;
    private $tipo;
    
    function MascotaDAO($id="", $nombre="", $sexo="", $peso="", $f_nacimiento="", $codigo="", $cliente="", $tipo=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> sexo = $sexo;
        $this -> peso = $peso;
        $this -> f_nacimiento = $f_nacimiento;
        $this -> codigo = $codigo;        
        $this -> cliente = $cliente;
        $this -> tipo = $tipo;
    }
    
    function registrar(){
        return "INSERT INTO mascota (nombre, sexo, peso, f_nacimiento, codgio, cliente, tipo)
                VALUES ('" . $this -> nombre . "', '" . $this -> sexo . "', '" . $this -> peso . "', '" . $this -> f_nacimiento . "', '" . $this -> codigo . "',  '" . $this -> cliente . "', '" . $this -> tipo . "')";
    }
    
    function consultar(){
        return "SELECT nombre, sexo, peso, f_nacimiento, codigo
                FROM mascota
                WHERE id_mascota =" . $this -> id;
    }
    
    function existeCodigo(){
        return "SELECT id_mascota
                FROM mascota
                WHERE codigo =". $this -> codigo; 
    }
        
    function consultarTodos(){
        return "SELECT id_mascota, nombre, sexo, peso, codigo
                FROM mascota";
    }
}


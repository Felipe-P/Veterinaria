<?php
class MascotaDAO{
    
    private $id;
    private $nombre;
    private $sexo;
    private $peso;
    private $f_nacimiento;
    private $cliente;
    private $tipo;
    
    function MascotaDAO($id="", $nombre="", $sexo="", $peso="", $f_nacimiento="", $cliente="", $tipo=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> sexo = $sexo;
        $this -> peso = $peso;
        $this -> f_nacimiento = $f_nacimiento;      
        $this -> cliente = $cliente;
        $this -> tipo = $tipo;
    }
    
    function registrar(){
        return "INSERT INTO mascota (nombre, sexo, peso, f_nacimiento, cliente_idcliente, tipo_mascota)
                VALUES ('" . $this -> nombre . "', '" . $this -> sexo . "', '" . $this -> peso . "', '" . $this -> f_nacimiento . "', '" . $this -> cliente . "', '" . $this -> tipo . "')";
    }
    
    function consultar(){
        return "SELECT nombre, sexo, peso, f_nacimiento
                FROM mascota 
                WHERE idmascota =" . $this -> id;
    }
    
    function consultarDetalle(){
        return "SELECT m.nombre, m.sexo, m.peso, m.f_nacimiento, tm.nombre
                FROM mascota as m
                INNER JOIN tipo_mascota tm
                ON m.tipo_mascota = tm.idtipo_mascota
                WHERE idmascota =" . $this -> id;
    }
    
    function actualizar(){
        return "update mascota set
                nombre = '" . $this -> nombre . "',
                sexo ='" . $this -> sexo . "',
                peso ='" . $this -> peso . "',
                f_nacimiento ='". $this -> f_nacimiento."',
                WHERE idmascota=" . $this -> id;
    }
    
    function existe(){
        return "SELECT idmascota
                FROM mascota
                WHERE nombre='" . $this -> nombre."'";
    }
 
    function consultarTodos(){
        return "SELECT idmascota, m.nombre, sexo,  peso, f_nacimiento, t.nombre
                FROM mascota m, tipo_mascota t
                WHERE cliente_idcliente=". $this -> cliente. " and idtipo_mascota=tipo_mascota";
    }
}


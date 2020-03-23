<?php
class LimpiezaDAO{
    
    private $id;
    private $tipo;
    
    function LimpiezaDAO($id="", $tipo=""){
        $this -> id = $id;
        $this -> tipo = $tipo;
    }
    
    function registrar(){
        return "INSERT INTO limpieza (limpieza)
                VALUES ('" . $this -> limpieza . "')";
    }
    
    function consultar(){
        return "SELECT idlimpieza
                FROM limpieza
                WHERE tipo='" . $this -> limpieza."'";
    }
    function autenticar($mascota){
        return "SELECT estado_proceso
                FROM solicitud, solicitud_limpieza
                WHERE mascota_idmascota=".$mascota. " and idsolicitud=solicitud_idsolicitud and limpieza_idlimpieza=".$this -> id;
    }
    
    function consultarTodos(){
        return "SELECT idlimpieza, tipo
                FROM limpieza";
    }
}

?>
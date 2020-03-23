<?php
class Solicitud_LimpiezaDAO{
    
    private $idSolicitud;
    private $idlimpieza;
    private $idAuxiliar;
    
    function Solicitud_LimpiezaDAO($idSolicitud="", $idlimpieza="",$idAuxiliar=""){
        $this -> idSolicitud = $idSolicitud;
        $this -> idlimpieza = $idlimpieza;
        $this -> idAuxiliar = $idAuxiliar;
    }
    
    function registrar(){
        return "INSERT INTO solicitud_limpieza (solicitud_idsolicitud, limpieza_idlimpieza)
                VALUES (" . $this -> idSolicitud . ", ".$this -> idlimpieza.")";
    }
    function ModificarAuxiliar(){
        return "update solicitud_limpieza set
                auxiliar_idauxiliar = " . $this -> idAuxiliar . "
                where solicitud_idsolicitud=" . $this -> idSolicitud;
    }
    function consultar(){
        return "SELECT limpieza_idlimpieza, auxiliar_idauxiliar
                FROM solicitud_limpieza
                WHERE solicitud_idsolicitud='" . $this -> idSolicitud."'";
    }
    
    
    function consultarTodos(){
        return "SELECT solicitud_idsolicitud, limpieza_idlimpieza, auxiliar_idauxiliar
                FROM especialidad";
    }
}

?>
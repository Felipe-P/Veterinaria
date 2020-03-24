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
    function consultartipo(){
        return "SELECT tipo
                FROM solicitud_limpieza, limpieza
                WHERE solicitud_idsolicitud=" . $this -> idSolicitud." and limpieza_idlimpieza=idlimpieza";
    }
    
    function consultarTodos(){
        return "SELECT solicitud_idsolicitud, limpieza_idlimpieza, auxiliar_idauxiliar
                FROM solicitud_limpieza";
    }
    
    function consultarSolicitudes(){
        return "SELECT solicitud_idsolicitud, limpieza_idlimpieza, estado_solicitud
                FROM solicitud_limpieza, solicitud
                WHERE auxiliar_idauxiliar =". $this -> idAuxiliar. " and estado_proceso=0 and solicitud_idsolicitud=idsolicitud and factura_idfactura is NULL";
    }
}

?>
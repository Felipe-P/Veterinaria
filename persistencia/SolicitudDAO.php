<?php
class SolicitudDAO{
    private $id;
    private $estadoProceso;
    private $estadoSolicitud;
    private $veterinario;
    private $tipoSolicitud;
    private $factura;
    private $mascota;
    private $fecha;
    private $hora;
    private $SolicitudDAO;
    private $conexion;
    
    
    function SolicitudDAO($id="", $estadoProceso="", $estadoSolicitud="", $veterinario="", $tipoSolicitud="", $factura="", $mascota="", $fecha="", $hora=""){
        $this -> id = $id;
        $this -> estadoProceso = $estadoProceso;
        $this -> estadoSolicitud = $estadoSolicitud;
        $this -> veterinario = $veterinario;
        $this -> tipoSolicitud = $tipoSolicitud;
        $this -> factura = $factura;
        $this -> mascota = $mascota;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
    }
    
    function registrar(){
        return "INSERT INTO solicitud (estado_proceso, estado_solicitud, tipo_solicitud_idtipo_solicitud,  mascota_idmascota, fecha, hora)
                VALUES ('" . $this -> estadoProceso . "', '" . $this -> estadoSolicitud . "', '" . $this -> tipoSolicitud . "','" . $this -> mascota . "','" . $this -> fecha . "','" . $this -> hora . "')";
    }
    
    function autenticar(){
        return "SELECT idcliente
                FROM cliente
                WHERE correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    function verificar(){
        return "SELECT estado_proceso, tipo_solicitud_idtipo_solicitud
                FROM solicitud
                WHERE mascota_idmascota=". $this ->mascota;
    }
    function verificarParaLimpieza(){
        return "SELECT estado_proceso, tipo_solicitud_idtipo_solicitud
                FROM solicitud
                WHERE mascota_idmascota=". $this ->mascota;
    }
    function actualizarEstadoP(){
        return "update solicitud set
                estado_proceso = '" . $this -> estadoProceso . "'
                where idsolicitud=" . $this -> id;
    }
    function actualizarEstadoS($estado){
        return "update solicitud set
                estado_solicitud = " . $estado . "
                where idsolicitud=" . $this -> id;
    }
    function actualizarveterinario(){
        return "update solicitud set
                veterinario_idveterinario = '" . $this -> veterinario . "'
                where idsolicitud=" . $this -> id;
    }
    function consultar(){
        return "SELECT estado_proceso, estado_solicitud, veterinario_idveterinario, tipo_solicitud_idtipo_solicitud, factura_idfactura, mascota_idmascota, fecha, hora
                FROM solicitud
                WHERE idsolicitud =" . $this -> id;
    }
    function consultarID(){
        return "SELECT idsolicitud
                FROM solicitud
                WHERE hora ='" . $this -> hora."' and fecha='". $this -> fecha."' and mascota_idmascota=". $this -> mascota;
    }
    function existeCorreo(){
        return "SELECT idcliente
                FROM cliente
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT   idsolicitud, estado_solicitud, t.nombre, m.nombre, fecha, hora
                FROM solicitud, tipo_solicitud t, mascota m
                WHERE tipo_solicitud_idtipo_solicitud=idtipo_solicitud and mascota_idmascota=idmascota and estado_solicitud=0
                order by m.nombre
               ";
    }
    function consultarIdMascota(){
        return "SELECT  mascota_idmascota, fecha
                FROM solicitud
                WHERE idsolicitud=". $this-> id;
    }
    function consultarDuplicados(){
        return "SELECT   idsolicitud
                FROM solicitud
                WHERE mascota_idmascota=".$this ->mascota. " and fecha='".$this->fecha."'";
    }
    
    function filtrar($filtro){
        return "select idcliente,nombre, apellido, correo, cedula
                from cliente
                where nombre like '%".$filtro."%'
                    or apellido like '%".$filtro."%'
                order by apellido";
    }
}

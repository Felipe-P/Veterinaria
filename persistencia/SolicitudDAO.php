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
    private $aux;
    
    function SolicitudDAO($id="", $estadoProceso="", $estadoSolicitud="", $veterinario="", $tipoSolicitud="", $factura="", $mascota="", $fecha="", $hora="",$aux=""){
        $this -> id = $id;
        $this -> estadoProceso = $estadoProceso;
        $this -> estadoSolicitud = $estadoSolicitud;
        $this -> veterinario = $veterinario;
        $this -> tipoSolicitud = $tipoSolicitud;
        $this -> factura = $factura;
        $this -> mascota = $mascota;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> aux = $aux;
        
    }
    
    function registrar(){
        return "INSERT INTO solicitud (estado_proceso, estado_solicitud, tipo_solicitud_idtipo_solicitud,  mascota_idmascota, fecha, hora)
                VALUES ('" . $this -> estadoProceso . "', '" . $this -> estadoSolicitud . "', '" . $this -> tipoSolicitud . "','" . $this -> mascota . "','" . $this -> fecha . "','" . $this -> hora . "')";
    }
    function registraraux(){
        return "INSERT INTO solicitud (estado_proceso, estado_solicitud, tipo_solicitud_idtipo_solicitud,  mascota_idmascota, fecha, hora,especialidad_aux)
                VALUES ('" . $this -> estadoProceso . "', '" . $this -> estadoSolicitud . "', '" . $this -> tipoSolicitud . "','" . $this -> mascota . "','" . $this -> fecha . "','" . $this -> hora . "','" . $this -> aux . "')";
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
    function verificarFactura(){
        return "SELECT factura_idfactura
                FROM solicitud
                WHERE mascota_idmascota=". $this ->mascota;
    }
    
    function EstadoFactura($factura){
        return "SELECT estado_pagada
                FROM factura
                WHERE idfactura=". $factura;
    }
    function verificarParaLimpieza(){
        return "SELECT estado_proceso, tipo_solicitud_idtipo_solicitud
                FROM solicitud
                WHERE mascota_idmascota=". $this ->mascota;
    }
    function actualizarEstadoP(){
        return "update solicitud set
                estado_proceso =" . $this -> estadoProceso . "
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
    function actualizarFactura(){
        return "update solicitud set
                factura_idfactura = '" . $this -> factura . "'
                where idsolicitud=" . $this -> id;
    }
    function consultar(){
        return "SELECT estado_proceso, estado_solicitud, veterinario_idveterinario, t.nombre, mascota_idmascota, fecha, hora
                FROM solicitud, tipo_solicitud t
                WHERE idsolicitud =" . $this -> id. " and tipo_solicitud_idtipo_solicitud=idtipo_solicitud";
    }
    function consultarParaFactura(){
        return "SELECT  tipo, m.nombre
                FROM solicitud, solicitud_limpieza, limpieza, mascota m
                WHERE idsolicitud =" . $this -> id. " and solicitud_idsolicitud=idsolicitud and limpieza_idlimpieza=idlimpieza and idmascota=mascota_idmascota ";
    }
    function consultarParaFacturaV(){
        return "SELECT  m.nombre
                FROM solicitud, mascota m
                WHERE idsolicitud =" . $this -> id. " and idmascota=mascota_idmascota ";
    }
    function consultarParaFacturaC(){
        return "SELECT  t.nombre, m.nombre
                FROM solicitud, mascota m, tipo_solicitud t
                WHERE idsolicitud =" . $this -> id. " and idmascota=mascota_idmascota and idtipo_solicitud=tipo_solicitud_idtipo_solicitud ";
    }
    function consultarID(){
        return "SELECT idsolicitud
                FROM solicitud
                WHERE hora ='" . $this -> hora."' and fecha='". $this -> fecha."' and mascota_idmascota=". $this -> mascota;
    }
    
    function consultarAux(){
        return "SELECT especialidad_aux
                FROM solicitud
                WHERE idsolicitud =" . $this -> id;
    }
    function existeCorreo(){
        return "SELECT idcliente
                FROM cliente
                WHERE correo = '" . $this -> correo . "'";
    }
    function consultarSolicitudesPendientesMascota(){
        return "SELECT   idsolicitud, estado_proceso, estado_solicitud, t.nombre, factura_idfactura, s.hora
                FROM solicitud s, tipo_solicitud t
                WHERE  idtipo_solicitud=tipo_solicitud_idtipo_solicitud and factura_idfactura is null and mascota_idmascota=".$this -> mascota;
    }
    function consultarSolicitudesPendientesMascota1(){
        return "SELECT   idsolicitud, estado_proceso, estado_solicitud, t.nombre, factura_idfactura, s.hora
                FROM solicitud s, tipo_solicitud t, factura
                WHERE  idtipo_solicitud=tipo_solicitud_idtipo_solicitud and factura_idfactura=idfactura and estado_pagada=0 and mascota_idmascota=".$this -> mascota;
    }
    function consultarSolicitudesPendientesMascota2(){
        return "SELECT   idsolicitud, estado_proceso, estado_solicitud, t.nombre, factura_idfactura, s.hora
                FROM solicitud s, tipo_solicitud t, factura
                WHERE  idtipo_solicitud=tipo_solicitud_idtipo_solicitud and factura_idfactura=idfactura and mascota_idmascota=".$this -> mascota;
    }
    function consultarTodos(){
        return "SELECT   idsolicitud, estado_solicitud, t.nombre, m.nombre, fecha, hora
                FROM solicitud, tipo_solicitud t, mascota m
                WHERE tipo_solicitud_idtipo_solicitud=idtipo_solicitud and mascota_idmascota=idmascota and estado_solicitud=0
                order by m.nombre
               ";
    }
    function consultarSolicitudes(){
        return "SELECT   idsolicitud, estado_proceso, t.nombre, factura_idfactura, m.nombre, fecha, hora
                FROM solicitud, tipo_solicitud t, mascota m
                WHERE  idtipo_solicitud=tipo_solicitud_idtipo_solicitud and mascota_idmascota=idmascota and factura_idfactura is NULL and veterinario_idveterinario=".$this -> veterinario;
    }
    
    function consultarHistorialVeterianrio(){
        return "SELECT   idsolicitud, estado_proceso, t.nombre, factura_idfactura, m.nombre, fecha, hora
                FROM solicitud, tipo_solicitud t, mascota m
                WHERE  idtipo_solicitud=tipo_solicitud_idtipo_solicitud and mascota_idmascota=idmascota and veterinario_idveterinario=".$this -> veterinario;
    }
    
    
    function consultarEsperaLimpieza($idAuxiliar){
        return "SELECT   idsolicitud, estado_proceso, t.tipo, m.nombre, fecha, hora
                FROM solicitud, limpieza t, mascota m, solicitud_limpieza
                WHERE idsolicitud=solicitud_idsolicitud and mascota_idmascota=idmascota and factura_idfactura is NULL and limpieza_idlimpieza=idlimpieza and auxiliar_idauxiliar=".$idAuxiliar;
              
    }
    function consultarHistorialAuxiliar($idAuxiliar){
        return "SELECT   idsolicitud, estado_proceso, t.tipo, factura_idfactura, m.nombre, fecha, hora
                FROM solicitud, limpieza t, mascota m, solicitud_limpieza
                WHERE idsolicitud=solicitud_idsolicitud and mascota_idmascota=idmascota and limpieza_idlimpieza=idlimpieza and auxiliar_idauxiliar=".$idAuxiliar;
        
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
    function filtroHistorialAuxiliar($filtro, $idAuxiliar){
        return "SELECT   idsolicitud, estado_proceso, t.tipo, factura_idfactura, m.nombre, fecha, hora
                FROM solicitud, limpieza t, mascota m, solicitud_limpieza
                WHERE idsolicitud=solicitud_idsolicitud and mascota_idmascota=idmascota and limpieza_idlimpieza=idlimpieza and auxiliar_idauxiliar=".$idAuxiliar. " and t.tipo like '%".$filtro."%'";
        
    }
    function filtrar($filtro){
        return "select idcliente,nombre, apellido, correo, cedula
                from cliente
                where nombre like '%".$filtro."%'
                    or apellido like '%".$filtro."%'
                order by apellido";
    }
}

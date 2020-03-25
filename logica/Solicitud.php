<?php
require 'persistencia/SolicitudDAO.php';
require_once 'persistencia/Conexion.php';

class Solicitud {
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
    private $SolicitudDAO;
    private $conexion;
    
    /**
    
     */
    public function getEstadoProceso()
    {
        return $this->estadoProceso;
    }

    /**
    
     */
    public function getEstadoSolicitud()
    {
        return $this->estadoSolicitud;
    }

    /**
    
     */
    public function getVeterinario()
    {
        return $this->veterinario;
    }

    /**
    
     */
    public function getTipoSolicitud()
    {
        return $this->tipoSolicitud;
    }

    /**
    
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
    
     */
    public function getMascota()
    {
        return $this->mascota;
    }

    /**
  
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @return SolicitudDAO
     */
    public function getSolicitudDAO()
    {
        return $this->SolicitudDAO;
    }

    /**
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param Ambigous <string, mixed> $estadoProceso
     */
    public function setEstadoProceso($estadoProceso)
    {
        $this->estadoProceso = $estadoProceso;
    }

    /**
     * @param Ambigous <string, mixed> $estadoSolicitud
     */
    public function setEstadoSolicitud($estadoSolicitud)
    {
        $this->estadoSolicitud = $estadoSolicitud;
    }

    /**
     * @param Ambigous <string, mixed> $veterinario
     */
    public function setVeterinario($veterinario)
    {
        $this->veterinario = $veterinario;
    }

    /**
     * @param Ambigous <string, mixed> $tipoSolicitud
     */
    public function setTipoSolicitud($tipoSolicitud)
    {
        $this->tipoSolicitud = $tipoSolicitud;
    }

    /**
     * @param Ambigous <string, mixed> $factura
     */
    public function setFactura($factura)
    {
        $this->factura = $factura;
    }

    /**
     * @param Ambigous <string, mixed> $mascota
     */
    public function setMascota($mascota)
    {
        $this->mascota = $mascota;
    }

    /**
     * @param Ambigous <string, mixed> $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param Ambigous <string, mixed> $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @param SolicitudDAO $SolicitudDAO
     */
    public function setSolicitudDAO($SolicitudDAO)
    {
        $this->SolicitudDAO = $SolicitudDAO;
    }

    /**
     * @param Conexion $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    function getId(){
        return $this -> id;
    }
    function getAux(){
        return $this -> aux;
    }
    
    function Solicitud($id="", $estadoProceso="", $estadoSolicitud="", $veterinario="", $tipoSolicitud="", $factura="", $mascota="", $fecha="", $hora="", $aux=""){
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
        $this -> conexion = new Conexion();
        $this -> SolicitudDAO = new SolicitudDAO($id, $estadoProceso, $estadoSolicitud, $veterinario, $tipoSolicitud, $factura, $mascota, $fecha, $hora, $aux);
    }
    function consultarIDmascota1(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarIDmascota1());
        $resultado = $this -> conexion -> extraer();
        $this -> mascota = $resultado[0];
        $this -> conexion -> cerrar();
    }
    function DiaMasProductivo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> DiaMasProductivo());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i][0]= $registro[0];
            $resultados[$i][1]= $registro[1];
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarAux(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarAux());
        $resultado = $this -> conexion -> extraer();
        $this -> aux = $resultado[0];
        $this -> conexion -> cerrar();
    }
    function verificar(){
        $this -> conexion -> abrir();
        $cont=0;
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> verificar());
        while (($registro = $this -> conexion -> extraer()) != null) {
            if(($registro[0]==0 && $registro[1]==2 ) || ($registro[0]==0 && $registro[1]==3 ) || ($registro[0]==0 && $registro[1]==1 ) ){
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
    function verificarFactura(){
        $this -> conexion -> abrir();
        $cont=0;
        $registros= array();
        $i=0;
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> verificarFactura());
        while (($registro = $this -> conexion -> extraer()) != null) {
           $registros [$i] =$registro[0];
        }
        $this -> conexion -> cerrar();
        return $registros;
    }
    function EstadoFactura($factura){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> verificarFactura($factura));
        $registro = $this -> conexion -> extraer();
        if($registro[0]==0){
            $this -> conexion -> cerrar();
            return false;
        }else{
            $this -> conexion -> cerrar();
            return true;
        }
    }
    function verificarParaLimpieza(){
        $this -> conexion -> abrir();
        $cont=0;
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> verificarParaLimpieza());
        while (($registro = $this -> conexion -> extraer()) != null) {
            if(($registro[0]==0 && $registro[1]==2 ) || ($registro[0]==0 && $registro[1]==3 )){
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
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    function registraraux(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> registraraux());
        $this -> conexion -> cerrar();
    }
    function consultarID(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarID());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> conexion -> cerrar();
    }
    function consultarParaFactura(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarParaFactura());
        $resultado = $this -> conexion -> extraer();
        $this -> tipoSolicitud = $resultado[0];
        $this -> mascota = $resultado[1];
        $this -> conexion -> cerrar();
    }
    function consultarParaFacturaV(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarParaFacturaV());
        $resultado = $this -> conexion -> extraer();
        $this -> mascota = $resultado[0];
        $this -> conexion -> cerrar();
    }
    function consultarParaFacturaC(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarParaFacturaC());
        $resultado = $this -> conexion -> extraer();
        $this -> tipoSolicitud = $resultado[0];
        $this -> mascota = $resultado[1];
        $this -> conexion -> cerrar();
    }
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> estadoProceso = $resultado[0];
        $this -> estadoSolicitud = $resultado[1];
        $this -> veterinario = $resultado[2];
        $this -> tipoSolicitud = $resultado[3];
        $this -> mascota = $resultado[4];
        $this -> fecha = $resultado[5];
        $this -> hora = $resultado[6];
        $this -> conexion -> cerrar();
    }
    function consultarParaModal(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarParaModal());
        $resultado = $this -> conexion -> extraer();
        $this -> estadoProceso = $resultado[0];
        $this -> estadoSolicitud = $resultado[1];
        $this -> veterinario = $resultado[2];
        $this -> tipoSolicitud = $resultado[3];
        $this -> mascota = $resultado[4];
        $this -> fecha = $resultado[5];
        $this -> hora = $resultado[6];
        $this -> factura =$resultado[7];
        $this -> conexion -> cerrar();
    }
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    function actualizarFactura(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> actualizarFactura());
        $this -> conexion -> cerrar();
    }
    function actualizarEstadoP(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> actualizarEstadoP());
        $this -> conexion -> cerrar();
    }
    function actualizarVeterinario(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> actualizarVeterinario());
        $this -> conexion -> cerrar();
    }
    function actualizarEstadoS($estado){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> actualizarEstadoS($estado));
        $this -> conexion -> cerrar();
    }
    function filtro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> filtrar($filtro));
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1],$registro[2],$registro[3], "", $registro[4]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],"",$registro[1], "", $registro[2], "", $registro[3], $registro[4], $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarSolicitudes(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarSolicitudes());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1], "","", $registro[2], $registro[3], $registro[4], $registro[5],$registro[6]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarSolicitudesPendientesMascota(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarSolicitudesPendientesMascota());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1], $registro[2], "", $registro[3], $registro[4],"","", $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarSolicitudesPendientesMascota1(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarSolicitudesPendientesMascota1());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1], $registro[2], "", $registro[3], $registro[4],"","", $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarSolicitudesPendientesMascota2(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarSolicitudesPendientesMascota2());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1], $registro[2], "", $registro[3], $registro[4],"","", $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarHistorialAuxiliar($auxiliar){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarHistorialAuxiliar($auxiliar));
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1], "", "", $registro[2], $registro[3], $registro[4], $registro[5], $registro[6]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarEsperaLimpieza($idAuxiliar){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarEsperaLimpieza($idAuxiliar));
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1], "", "", $registro[2], "", $registro[3], $registro[4], $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarHistorialVeterinario(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarHistorialVeterianrio());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1], "","", $registro[2], $registro[3], $registro[4], $registro[5],$registro[6]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function filtroHistorialAuxiliar($filtro,$auxiliar){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> filtroHistorialAuxiliar($filtro,$auxiliar));
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0],$registro[1], "", "", $registro[2], $registro[3], $registro[4], $registro[5], $registro[6]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarDuplicados(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarDuplicados());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Solicitud($registro[0]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarIdMascota(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudDAO -> consultarIdMascota());
        $registro = $this -> conexion -> extraer();
        $this -> mascota = $registro[0];
        $this -> fecha = $registro[1];
        $this -> conexion -> cerrar();
    }
}
?>
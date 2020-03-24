<?php
require 'persistencia/reporteClinicoDAO.php';
require_once 'persistencia/Conexion.php';

class reporteClinico {
    private $id;
    private $fecha;
    private $diagnostico;
    private $tratamiento;
    private $observaciones;
    private $mascota;
    private $reporteClinicoDAO;
    private $conexion;
    
    
    
    /**
     * @return  <string, mixed>
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return string
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * @return string
     */
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /**
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @return string
     */
    public function getMascota()
    {
        return $this->mascota;
    }

    /**
     * @param Ambigous <string, mixed> $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param string $diagnostico
     */
    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;
    }

    /**
     * @param string $tratamiento
     */
    public function setTratamiento($tratamiento)
    {
        $this->tratamiento = $tratamiento;
    }

    /**
     * @param string $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @param string $mascota
     */
    public function setMascota($mascota)
    {
        $this->mascota = $mascota;
    }

    function reporteClinico($id="", $fecha="", $diagnostico="", $tratamiento="", $observaciones="", $mascota=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> diagnostico = $diagnostico;
        $this -> tratamiento = $tratamiento;
        $this -> observaciones = $observaciones;
        $this -> mascota = $mascota;
        $this -> conexion = new Conexion();
        $this -> reporteClinicoDAO = new reporteClinicoDAO($id, $fecha, $diagnostico, $tratamiento, $observaciones, $mascota);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reporteClinicoDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reporteClinicoDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reporteClinicoDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new reporteClinico($registro[0],$registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}
?>
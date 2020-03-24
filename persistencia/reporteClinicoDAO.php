<?php
class reporteClinicoDAO{
    private $id;
    private $fecha;
    private $diagnostico;
    private $tratamiento;
    private $observaciones;
    private $mascota;
    
    function reporteClinicoDAO($id="", $fecha="", $diagnostico="", $tratamiento="", $observaciones="", $mascota=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> diagnostico = $diagnostico;
        $this -> tratamiento = $tratamiento;
        $this -> observaciones = $observaciones;
        $this -> mascota = $mascota;
    }
    
    function registrar(){
        return "INSERT INTO reporte_clinico (fecha, diagnostico, tratamiento, observaciones, mascota_idmascota)
                VALUES ('" . $this -> fecha . "','" . $this -> diagnostico . "', '" . $this -> tratamiento . "', '" . $this -> observaciones . "', " . $this -> mascota . ")";
    }
    
    function consultar(){
        return "SELECT idespecialidad
                FROM especialidad
                WHERE nombre='" . $this -> nombre."'";
    }
   
    
    function consultarTodos(){
        return "SELECT idespecialidad, nombre
                FROM especialidad";
    }
}

?>
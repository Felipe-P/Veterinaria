<?php
class FacturaDAO{
    
    private $id;
    private $precio;
    private $fecha;
    private $hora;
    
    function FacturaDAO($id="", $precio="", $fecha="", $hora=""){
        $this -> id = $id;
        $this -> precio = $precio;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
    }
    
    function registrar(){
        return "INSERT INTO factura (precio,fecha, hora)
                VALUES (" . $this -> precio . ", '". $this->fecha."', '".$this->hora."')";
    }
    
    function consultarId(){
        return "SELECT idFactura
                FROM Factura
                WHERE precio=" . $this -> precio." and fecha='".$this->fecha."' and hora='".$this->hora."'";
    }
   
    
    function consultarTodos(){
        return "SELECT idFactura, precio
                FROM Factura";
    }
}

?>
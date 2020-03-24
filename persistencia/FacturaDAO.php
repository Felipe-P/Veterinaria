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
    function actualizarPago($pago){
        return "update factura set
                estado_pagada =".$pago."
                where idfactura=" . $this -> id;
    }
    function registrar(){
        return "INSERT INTO factura (precio,fecha, hora)
                VALUES (" . $this -> precio . ", '". $this->fecha."', '".$this->hora."')";
    }
    
    function consultarId(){
        return "SELECT idfactura
                FROM factura
                WHERE precio=" . $this -> precio." and fecha='".$this->fecha."' and hora='".$this->hora."'";
    }
    function consultar(){
        return "SELECT fecha, hora, precio, estado_pagada
                FROM factura
                WHERE idfactura=". $this -> id;
    }
   
    
    function consultarTodos(){
        return "SELECT idfactura, precio
                FROM factura";
    }
}

?>
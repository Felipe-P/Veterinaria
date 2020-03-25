<?php
include_once ('pdf/class.ezpdf.php');
$pdf =new Cezpdf('a4');
$pdf->selectFont('pdf/fonts/courier.afm');
if(isset($_GET["idMascota"])){
    $mascota=$_GET["idMascota"];
}else{
    if(isset($_GET["idSolicitud"])){
        $solicitud = new Solicitud($_GET["idSolicitud"]);
        $solicitud -> consultarIDmascota1();
        $mascota = $solicitud -> getMascota();
    }
}
$reporte= new reporteClinico("","","","","",$mascota);
$masco = new Mascota($mascota);
$masco -> consultar();
$cliente = new Cliente($masco ->getCliente());
$cliente -> consultar();
$c= array ();
$c= $reporte ->consultarTodosPorMascota();
$informacionCreador = array (
    'Title'=>'Reporte Clinico De '.$masco -> getNombre(),
    'Author'=>'Usuario',
    'Subject'=>'Reporte Clinicoe',
    'Creator'=>'100@100.com',
);

// i 0
// n 4
// j 1
// n 4

$pdf->addInfo($informacionCreador);
$indice=1;

for($i=0; $i<sizeof($c);$i++){
    $pdf->ezText("<b>Reporte Clinico ".$indice."</b>\n\n",20);
    $pdf->ezText("<b>Fecha Del Historial: </b>".$c[$i]->getFecha()."\n",12);
    $pdf->ezText("------------------------------------------------------------------------\n",12);
    $pdf->ezText("Datos Cliente:\n",14);
    $pdf->ezText("<b>Nombre: </b>".$cliente -> getNombre()."                         Apellido: " .$cliente ->getApellido()."\n",12);
    $pdf->ezText("<b>Cedula: </b>".$cliente -> getCedula()."\n",12);
    $pdf->ezText("-------------------------------------------------------------------------\n",12);
    $pdf->ezText("Datos Mascota:\n",14);
    $pdf->ezText("<b>Nombre Mascota: </b>".$masco -> getNombre()."            <b>Sexo: </b>".$masco ->getSexo()."\n",12);
    $pdf->ezText("<b>Peso: </b>".$masco ->getPeso()." kg                            <b>Fecha Nacimiento: </b>".$masco ->getF_nacimiento()."\n",12);
    $pdf->ezText("<b>Tipo Mascota: </b>".$masco ->getTipo()."\n",12);
    $pdf->ezText("--------------------------------------------------------------------------\n",12);
    $pdf->ezText("Reporte Clinico:\n",14);
    $pdf->ezText("<b>Diagnostico: </b>".$c[$i]->getDiagnostico()."\n",12);
    $pdf->ezText("<b>Tratamiento: </b>".$c[$i]->getTratamiento()."\n",12);
    $pdf->ezText("<b>Observaciones: </b>".$c[$i]->getObservaciones()."\n",12);
    $indice++;
   $pdf -> eznewPage();
   
}
$pdf->ezText("\n\n\n",10);
ob_end_clean(); 
$pdf->ezStream();
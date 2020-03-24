<?php
$s= new Solicitud($_GET["idSolicitud"],1);
$s -> actualizarEstadoP();
echo "<span class='fas " . ($s -> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getEstadoProceso() == 0?"En Espera":"Realizado") . "' ></span>";
?>
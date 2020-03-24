<?php

require 'logica/Persona.php';
require 'logica/Administrador.php';
require 'logica/Veterinario.php';
require 'logica/Auxiliar.php';
require 'logica/Cliente.php';
require 'logica/Especialidad.php';
require 'logica/Mascota.php';
require 'logica/Tipo_Mascota.php';
require 'logica/Tipo_Solicitud.php';
require 'logica/Limpieza.php';
require 'logica/Solicitud_Limpieza.php';
require 'logica/Solicitud.php';
require 'Logica/reporteClinico.php';

$pid = base64_decode($_GET["pid"]);
include $pid;
?>
<script type="text/javascript">
$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
})
</script>
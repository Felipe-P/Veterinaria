<?php
require 'logica/Persona.php';
require 'logica/Administrador.php';
require 'logica/Veterinario.php';
require 'logica/Auxiliar.php';
require 'logica/Cliente.php';
require 'logica/Especialidad.php';
require 'logica/Mascota.php';

$pid = base64_decode($_GET["pid"]);
include $pid;
?>
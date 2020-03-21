<?php 
session_start();
require 'logica/Persona.php';
require 'logica/Administrador.php';
require 'logica/Veterinario.php';
require 'logica/Auxiliar.php';
require 'logica/Cliente.php';
require 'logica/Especialidad.php';
require 'logica/Mascota.php';
require 'logica/Tipo_Mascota.php';
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
        	  $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Veterinaria</title>

</head>

<body>
    <?php
    if (isset($_GET["pid"])) {
        $pid = base64_decode($_GET["pid"]);
        if (isset($_GET["nos"]) || (!isset($_GET["nos"]) && $_SESSION['id'] != "")) {
            include $pid;
        } else {
            header("Location: index.php");
        }
    } else {
        $_SESSION['id'] = "";
        include 'presentacion/inicio.php';
    }
    ?>
</body>
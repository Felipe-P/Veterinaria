<?php
$auxiliar = new Auxiliar($_SESSION['id']);
$auxiliar -> consultar();
include 'presentacion/auxiliar/menuAuxiliar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Bienvenido</div>
                <div class="card-body">
                    <p>Usuario: <?php echo $auxiliar -> getNombre() . " " . $auxiliar -> getApellido() ?></p>
                    <p>Correo: <?php echo $auxiliar -> getCorreo(); ?></p>
                    <p>Hoy es: <?php echo date("d-M-Y"); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$veterinario = new Veterinario($_SESSION['id']);
$veterinario -> consultar();
include 'presentacion/veterinario/menuVeterinario.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Bienvenido</div>
                <div class="card-body">
                    <p>Usuario: <?php echo $veterinario -> getNombre() . " " . $veterinario -> getApellido() ?></p>
                    <p>Correo: <?php echo $veterinario -> getCorreo(); ?></p>
                    <p>Hoy es: <?php echo date("d-M-Y"); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$veterinario = new Veterinario($_SESSION['id']);
$veterinario -> consultar();
include 'presentacion/veterinario/menuVeterinario.php';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Bienvenido</div>
                <div class="card-body">
                    <p>Veterinario <?php echo $veterinario -> getEspecialidad(). " : ". $veterinario -> getNombre() . " " . $veterinario -> getApellido() ?></p>
                    <p>Correo: <?php echo $veterinario -> getCorreo(); ?></p>
                    <p>Hoy es: <?php echo date("d-M-Y"); ?></p>
                </div>
            </div>
        </div>
        <?php 
        $solicitud =new Solicitud("","","",$_SESSION["id"]);
        $solicitudes =$solicitud ->consultarSolicitudes();
        if(count($solicitudes)!=0){
           echo "<div class='col-6'>
            <div class='tile'>
            <div class='tile is-parent is-vertical'>
            <article class='tile is-child notification is-primary'>
            <p class='title'>Notificacion</p>
            <p class='subtitle'>Posees ".count($solicitudes). " solicitudes de ".($veterinario -> getEspecialidad()=="General"?"revison":"tratamiento")." en espera</p>
            </article>
            </div>
            </div>
            </div>";
        }
        
        ?>
    </div>
</div>
</div>

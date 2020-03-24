<?php
$auxiliar = new Auxiliar($_SESSION['id']);
$auxiliar -> consultar();
include 'presentacion/auxiliar/menuAuxiliar.php';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Bienvenido</div>
                <div class="card-body">
                    <p>Usuario: <?php echo $auxiliar -> getNombre() . " " . $auxiliar -> getApellido() ?></p>
                    <p>Correo: <?php echo $auxiliar -> getCorreo(); ?></p>
                    <p>Hoy es: <?php echo date("d-M-Y"); ?></p>
                </div>
            </div>
        </div>
        <?php 
        $solicitud =new Solicitud_Limpieza("","",$_SESSION["id"]);
        $solicitudes =$solicitud ->consultarSolicitudes();
        if(count($solicitudes)!=0){
           echo "<div class='col-6'>
            <div class='tile'>
            <div class='tile is-parent is-vertical'>
            <article class='tile is-child notification is-primary'>
            <p class='title'>Notificacion</p>
            <p class='subtitle'>Posees ".count($solicitudes). " solicitudes de limpieza en espera</p>
            </article>
            </div>
            </div>
            </div>";
        }
        
        ?>
    </div>
</div>
</div>


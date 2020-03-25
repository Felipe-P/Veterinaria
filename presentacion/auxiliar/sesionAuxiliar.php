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
               <article class='message is-link'>
                <div class='message-header'>
                <p>Notificacion</p>
                 
                 </div>
                <div class='message-body'>
                        Posees ".count($solicitudes). " solicitudes de limpieza en espera
                </div>
            </article>
            </div>";
        }
        
        ?>
    </div>
</div>
</div>


<?php
$cliente = new Cliente($_SESSION['id']);
$cliente -> consultar();
include 'presentacion/cliente/menuCliente.php';
?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Bienvenido</div>
                <div class="card-body">
                    <p>Usuario: <?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?></p>
                    <p>Correo: <?php echo $cliente -> getCorreo(); ?></p>
                    <p>Hoy es: <?php echo date("d-M-Y"); ?></p>
                </div>
            </div>
        </div>
        <?php 
        $mascota = new Mascota("","","","","", $_SESSION["id"]);
        $mascotas = $mascota ->consultarTodos();
        $cantidad=0;
        $cantidad1=0;
        foreach ($mascotas as $m){
            $solicitud =new Solicitud("","","","","","",$m->getId());
            $cantidad+= count($solicitud -> consultarSolicitudesPendientesMascota());
            $cantidad1 += count($solicitud -> consultarSolicitudesPendientesMascota1());
        }
        
        if($cantidad!=0 || $cantidad1!=0 ){
            $cantidad+=$cantidad1;
            echo "<div class='col-6'>
               <article class='message is-link'>
                <div class='message-header'>
                <p>Notificacion</p>
                 
                 </div>
                <div class='message-body'>
                        Posees ". $cantidad. " solicitudes en proceso
                </div>
                </article>";
              
          
            if($cantidad1!=0 ){
                echo "<article class='message is-link'>
                <div class='message-header'>
                <p>Notificacion</p>
                
                </div>
                <div class='message-body'>
                Posees ".$cantidad1. " Facturas en espera
                </div>
                </article>";
           }
           
             echo "</div>";
        }
        
        ?>
        
    </div>
</div>
</div>


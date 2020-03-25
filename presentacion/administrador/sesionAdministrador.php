<?php

	$administrador = new Administrador($_SESSION['id']);
	$administrador -> consultar();
	include 'presentacion/administrador/menuAdministrador.php';
?>

		<div class="col-8 mt-4">
			<div class="card">
				<div class="card-header bg-primary text-white">Bienvenido Administrador</div>
				<div class="card-body">
					<p>Usuario: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?></p>
					<p>Correo: <?php echo $administrador -> getCorreo(); ?></p>
					<p>Hoy es: <?php echo date("d-M-Y"); ?></p>
				</div>
			</div>
		<?php 
        $solicitud =new Solicitud("","","",$_SESSION["id"]);
        $solicitudes =$solicitud ->consultarTodos();
        if(count($solicitudes)!=0){
           echo "<div class='col-6'>
               <article class='message is-link'>
                <div class='message-header'>
                <p>Notificacion</p>
                 
                 </div>
                <div class='message-body'>
                        Posees ".count($solicitudes). " solicitudes en espera de asignacion
                </div>
            </article>";
        }
        
        ?>
</div>
</div>

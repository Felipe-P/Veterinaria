<?php
require_once 'logica/Persona.php';
require_once 'logica/Veterinario.php';

$idVeterinario= $_GET['idVeterinario'];
$veterinario = new Veterinario($idVeterinario);
$veterinario -> consultar(); 
?>
<header class="modal-card-head">
      <p class="modal-card-title">Detalles Veterinario</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <table class="table table-striped table-hover">
		<tbody>
			<tr>
                <th width="20%">Nombre</th>
                <td><?php echo $veterinario -> getNombre(); ?></td>
            </tr>
            <tr>
                <th width="20%">Apellido</th>
                <td><?php echo $veterinario -> getApellido(); ?></td>
            </tr>
            <tr>
                <th width="20%">Correo</th>
                <td><?php echo $veterinario -> getCorreo(); ?></td>
            </tr>
            <tr>
                <th width="20%">Especialidad</th>
                <td><?php echo $veterinario -> getEspecialidad(); ?></td>
            </tr>
            <tr>
                <th width="20%">Disponibilidad</th>
                <td><?php echo (($veterinario -> getDsiponibilidad() == 0)?"<i class='fas fa-check-circle text-success'></i>":"<i class='fas fa-times-circle text-danger'></i>"); ?></td>
            </tr>
		</tbody>
	</table>
    </section>
 
<?php
require_once 'logica/Persona.php';
require_once 'logica/Veterinario.php';

$idVeterinario= $_GET['idVeterinario'];
$veterinario = new Veterinario($idVeterinario);
$veterinario -> consultar(); 
?>
<div class="modal-header">
	<h5 class="modal-title">Detalle veterinario</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
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
                <td><?php echo (($veterinario -> getDisponibilidad() == 0)?"<i class='fas fa-check-circle text-success'></i>":"<i class='fas fa-times-circle text-danger'></i>"); ?></td>
            </tr>
		</tbody>
	</table>
</div>
 
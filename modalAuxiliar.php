<?php
require_once 'logica/Persona.php';
require_once 'logica/Auxiliar.php';

$idAuxiliar = $_GET['idAuxiliar'];
$auxiliar = new Auxiliar($idAuxiliar);
$auxiliar -> consultar();
?>
<div class="modal-header">
	<h5 class="modal-title">Detalle auxiliar</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tbody>
			<tr>
                <th width="20%">Nombre</th>
                <td><?php echo $auxiliar -> getNombre(); ?></td>
            </tr>
            <tr>
                <th width="20%">Apellido</th>
                <td><?php echo $auxiliar -> getApellido(); ?></td>
            </tr>
            <tr>
                <th width="20%">Correo</th>
                <td><?php echo $auxiliar -> getCorreo(); ?></td>
            </tr>
            <tr>
                <th width="20%">Disponibilidad</th>
                <td><?php echo (($auxiliar -> getDisponibilidad() == 0)?"<i class='fas fa-check-circle text-success'></i>":"<i class='fas fa-times-circle text-danger'></i>"); ?></td>
            </tr>
		</tbody>
	</table>
</div>
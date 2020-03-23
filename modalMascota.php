<?php
require_once 'logica/Cliente.php';
require_once 'logica/Mascota.php';

$idMascota = $_GET['idMascota'];
$mascota = new Mascota($idMascota);
$mascota -> consultarDetalle();
?>
<div class="modal-header">
	<h5 class="modal-title">Detalle mascota</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tbody>
			<tr>
                <th width="20%">Nombre</th>
                <td><?php echo $mascota -> getNombre(); ?></td>
            </tr>
            <tr>
                <th width="20%">Sexo</th>
                <td><?php echo $mascota -> getSexo(); ?></td>
            </tr>
            <tr>
                <th width="20%">Peso</th>
                <td><?php echo $mascota -> getPeso(); ?></td>
            </tr>
            <tr>
                <th width="20%">Fecha Nacimiento</th>
                <td><?php echo $mascota -> getF_nacimiento(); ?></td>
            </tr>
            <tr>
                <th width="20%">Tipo</th>
                <td><?php echo $mascota -> getTipo(); ?></td>
            </tr>            
		</tbody>
	</table>
</div>
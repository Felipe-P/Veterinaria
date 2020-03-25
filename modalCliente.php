<?php
require_once 'logica/Persona.php';
require_once 'logica/Cliente.php';

$idCliente = $_GET['idCliente'];
$cliente = new Cliente($idCliente);
$cliente -> consultar(); 
?>

    <div class="modal-header">
	<h5 class="modal-title">Detalle Cliente</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
      <table class="table table-striped table-hover">
		<tbody>
			<tr>
                <th width="20%">Nombre</th>
                <td><?php echo $cliente -> getNombre(); ?></td>
            </tr>
            <tr>
                <th width="20%">Apellido</th>
                <td><?php echo $cliente -> getApellido(); ?></td>
            </tr>
            <tr>
                <th width="20%">Cedula</th>
                <td><?php echo $cliente -> getCedula(); ?></td>
            </tr>
            <tr>
                <th width="20%">Correo</th>
                <td><?php echo $cliente -> getCorreo(); ?></td>
            </tr>
		</tbody>
	</table>
</div>
    
  

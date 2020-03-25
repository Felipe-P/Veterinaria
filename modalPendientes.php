<?php
require_once 'logica/Solicitud.php';
require_once 'logica/Solicitud_Limpieza.php';
$solicit = new Solicitud();
$solicitudes =$solicit->consultarTodos();

?>
<div class="modal-header">
	<h5 class="modal-title">Detalle Solicitud</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
      <table class="table table-striped table-hover">
			
		<tbody>
		<?php foreach ($solicitudes as $s){
			    if($s->getId()==$_GET["idSolicitud"]){
			?>
			<tr>
                <th width="30%">ID</th>
                <td><?php echo $s -> getId(); ?></td>
            </tr>
            <tr>
                <th width="30%">Estado Asignacion</th>
                <td><?php  echo "<span class='fas " . ($s -> getEstadoSolicitud() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getEstadoSolicitud() == 0?"Sin Asignar":"Asignado") . "' ></span>"; ?></td>
            </tr>
            <tr>
                <th width="30%">Nombre Cliente</th>
                <td><?php   $soli= new Solicitud( $s->getId());
                $soli ->consultarIDmascota1();
                            $mascota= new Mascota($soli ->getMascota()); 
                            $mascota -> consultar();
                            $cliente= new Cliente($mascota -> getCliente());
                            $cliente -> consultar();
                        echo $cliente -> getNombre(). " ". $cliente -> getApellido(); ?></td>
            </tr>
            <tr>
                <th width="30%">Nombre Mascota</th>
                <td><?php echo $s -> getMascota(); ?></td>
            </tr>
            <tr>
                <th width="30%">Tipo Solucitud</th>
                <td><?php echo $s -> getTipoSolicitud() ?></td>
            </tr>
            <tr>
                <th width="30%">fecha Solicitud</th>
                <td><?php echo $s -> getFecha(); ?></td>
            </tr>
            <tr>
                <th width="30%">Hora Solicitud</th>
               <td><?php echo $s -> getHora(); ?></td>
               </tr>
            <?php }}?>
		</tbody>
	</table>
</div>
 
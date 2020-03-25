<?php
require_once 'logica/Solicitud.php';
require_once 'logica/Solicitud_Limpieza.php';
$solicit = new Solicitud($_GET["idSolicitud"]);
$solicit -> consultar();

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
			<tr>
                <th width="30%">ID</th>
                <td><?php echo $solicit -> getId(); ?></td>
            </tr>
            <tr>
                <th width="30%">Estado Proceso</th>
                <td><?php  echo "<span class='fas " . ($solicit -> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($solicit  -> getEstadoSolicitud() == 0?"Sin Realizar":"Realizado") . "' ></span>"; ?></td>
            </tr>
            <tr>
                <th width="30%">Estado Facturacion</th>
                <td><?php  echo "<span class='fas " . ($solicit -> getFactura() == ""?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($solicit  -> getFactura()== ""?"Sin Facturar":"Facturado") . "' ></span>"; ?></td>
            </tr>
            <tr>
                <th width="30%">Nombre Cliente</th>
                <td><?php  
                          $mascota= new Mascota($solicit ->getMascota()); 
                            $mascota -> consultar();
                            $cliente= new Cliente($mascota -> getCliente());
                            $cliente -> consultar();
                        echo $cliente -> getNombre(). " ". $cliente -> getApellido(); ?></td>
            </tr>
            <tr>
                <th width="30%">Nombre Mascota</th>
                <td><?php echo $mascota -> getNombre(); ?></td>
            </tr>
            <tr>
                <th width="30%">fecha Solicitud</th>
                <td><?php echo $solicit -> getFecha(); ?></td>
            </tr>
            <tr>
                <th width="30%">Hora Solicitud</th>
               <td><?php echo $solicit -> getHora(); ?></td>
               </tr>
		</tbody>
	</table>
</div>
<?php
require_once 'logica/Solicitud.php';
require_once 'logica/Solicitud_Limpieza.php';
$solicitud= new Solicitud($_GET["idSolicitud"]);
$solicitud -> consultarParaModal();

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
                <td><?php echo $solicitud -> getId(); ?></td>
            </tr>
            <tr>
                <th width="30%">Estado Solicitud</th>
                <td><?php  echo "<span class='fas " . ($solicitud -> getEstadoSolicitud() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($solicitud  -> getEstadoSolicitud() == 0?"Sin Asignar":"Asignado") . "' ></span>"; ?></td>
            </tr>
            <tr>
                <th width="30%">Estado Proceso</th>
                <td><?php  echo "<span class='fas " . ($solicitud -> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($solicitud  -> getEstadoProceso() == 0?"Sin Realizar":"Realizado") . "' ></span>"; ?></td>
            </tr>
            
            <tr>
                <th width="30%">Estado Facturacion</th>
                <td><?php  echo "<span class='fas " . ($solicitud -> getFactura() == ""?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($solicitud  -> getFactura()== ""?"Sin Facturar":"Facturado") . "' ></span>"; ?></td>
            </tr>
            <tr>
                <th width="30%">Tipo Proceso</th>
                <td><?php 
                    echo $solicitud -> getTipoSolicitud()?></td>
            </tr>
            <?php 
            if($solicitud -> getTipoSolicitud()=="Limpieza"){
                $s = new Solicitud_Limpieza($solicitud -> getId());
                $s ->consultarParaModal();
                
                echo "<tr>
                <th width='30%'>Tipo Limpieza</th>
                <td>". $s -> getIdLimpieza()."</td> </tr>";
                if($solicitud -> getEstadoSolicitud()!=0){
                    echo "<tr>
                <th width='30%'>Auxiliar</th>
                <td>". $s -> getIdAuxiliar()."</td> </tr>";
                }
            }else{
                if($solicitud -> getEstadoSolicitud()!=0){
                    $ve= new Veterinario($solicitud -> getVeterinario());
                    $ve -> consultar();
                    echo "<tr>
                <th width='30%'>Veterinario</th>
                <td>". $ve -> getNombre()." ".$ve -> getApellido()."</td> </tr>";
                }
            }
            
            
            
            ?>
            <tr>
                <th width="30%">Nombre Mascota</th>
                <td><?php 
                echo $solicitud -> getMascota() ?></td>
            </tr>
            <tr>
                <th width="30%">fecha Solicitud</th>
                <td><?php echo $solicitud -> getFecha(); ?></td>
            </tr>
            <tr>
                <th width="30%">Hora Solicitud</th>
               <td><?php echo $solicitud -> getHora(); ?></td>
               </tr>
		</tbody>
	</table>
</div>
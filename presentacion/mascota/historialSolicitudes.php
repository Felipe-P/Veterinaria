<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
$mascota = new Mascota("","","","","", $_SESSION["id"]);
$mascotas = $mascota ->consultarTodos();
include 'presentacion/cliente/menuCliente.php';



?>
<div class="container col-10">
	<div class="row">
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Historial De Solicitudes</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Estado Asignacion</th>
								<th scope="col">Estado Proceso</th>
								<th scope="col">Tipo De Solicitud</th>
								<th scope="col">Hora De Solicitud</th>
								<th scope="col">Facturacion</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadosAuxiliares">
						<?php
						$cantidad=0;
						foreach ($mascotas as $m){
						    $solicitud =new Solicitud("","","","","","",$m->getId());
						$solicitudes=$solicitud->consultarSolicitudesPendientesMascota();
						$solicitudes1=$solicitud->consultarSolicitudesPendientesMascota2();
						foreach($solicitudes as $s){
                            
                            echo "<tr>";
                            echo "<td>" . $s-> getId() . "</td>";
                            echo "<td>" . "<span class='fas " . ($s-> getEstadoSolicitud() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s -> getEstadoSolicitud() == 0?"Sin Asignar":"Asignado") . "' ></span>"."</td>";
                            echo "<td>" . "<span class='fas " . ($s-> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s-> getEstadoProceso() == 0?"Sin Realizar":"Realizado") . "' ></span>"."</td>";
                            echo "<td>" . $s -> getTipoSolicitud(). "</td>";
                            echo "<td>" . $s -> getHora(). "</td>";
                            echo "<td>" . "<span class='fas " . ($s-> getFactura() == ""?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s -> getFactura() == ""?"Sin Facturar":"Facturado") . "' ></span>"."</td>";
                
                                echo "<td>" . "
                                           <a href='indexAjax.php?pid=". base64_encode("modalAuxiliar.php") . "&idAuxiliar=" . $s -> getId() . "' data-toggle='modal' data-target='#modalAuxiliar' >
                                                <span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>";
                                         
                                if($s-> getFactura()!=""){
                                    echo "<a class='fas fa-money-check-alt' href='index.php?pid=". base64_encode("presentacion/mascota/pagarFactura.php") . "&idFactura=" . $s  -> getFactura() . "&idSolicitud=".$s ->getId()."' data-toggle='tooltip' data-placement='left' title='Ver Factura'> </a>";
                                    echo "<span class='label'>100% <progress class='progress is-success' value='100' max='100'>100+%</progress></span>";
                                }else{
                                    if($s-> getEstadoProceso()==1){
                                        echo "<span class='label'>67% <progress class='progress is-success' value='67' max='100'>67%</progress></span>";
                                    }else{
                                        if($s-> getEstadoSolicitud()==1){
                                            echo "<span class='label'>33% <progress class='progress is-success' value='33' max='100'>33%</progress></span>";
                                        }else{
                                            if($s-> getEstadoSolicitud()==0){
                                                echo "<span class='label'>0% <progress class='progress is-success' value='0' max='100'>0%</progress></span>";
                                            }
                                        }
                                    }
                                }
 
                                        
                                    
                                echo "   </td>";
                                          "</tr>";
                            $cantidad++;
                           }
                           foreach($solicitudes1 as $s1){
                               
                               echo "<tr>";
                               echo "<td>" . $s1-> getId() . "</td>";
                               echo "<td>" . "<span class='fas " . ($s1-> getEstadoSolicitud() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s1 -> getEstadoSolicitud() == 0?"Sin Asignar":"Asignado") . "' ></span>"."</td>";
                               echo "<td>" . "<span class='fas " . ($s1-> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s1-> getEstadoProceso() == 0?"Sin Realizar":"Realizado") . "' ></span>"."</td>";
                               echo "<td>" . $s1 -> getTipoSolicitud(). "</td>";
                               echo "<td>" . $s1 -> getHora(). "</td>";
                               echo "<td>" . "<span class='fas " . ($s1-> getFactura() == ""?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s1 -> getFactura() == ""?"Sin Facturar":"Facturado") . "' ></span>"."</td>";
                               
                               echo "<td>" . "
                                           <a href='indexAjax.php?pid=". base64_encode("modalHistorialSolicitud.php") . "&idSolicitud=" . $s1 -> getId() . "' data-toggle='modal' data-target='#modalHistorialSolicitud' >
                                                <span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>";
                               
                               if($s1-> getFactura()!=""){
                                   echo "<a class='fas fa-money-check-alt' href='index.php?pid=". base64_encode("presentacion/mascota/pagarFactura.php") . "&idFactura=" . $s1  -> getFactura() . "&idSolicitud=".$s1 ->getId()."' data-toggle='tooltip' data-placement='left' title='Ver Factura'> </a>";
                                   echo "<span class='label'>100% <progress class='progress is-success' value='100' max='100'>100+%</progress></span>";
                               }else{
                                   if($s1-> getEstadoProceso()==1){
                                       echo "<span class='label'>67% <progress class='progress is-success' value='67' max='100'>67%</progress></span>";
                                   }else{
                                       if($s1-> getEstadoSolicitud()==1){
                                           echo "<span class='label'>33% <progress class='progress is-success' value='33' max='100'>33%</progress></span>";
                                       }else{
                                           if($s1-> getEstadoSolicitud()==0){
                                               echo "<span class='label'>0% <progress class='progress is-success' value='0' max='100'>0%</progress></span>";
                                           }
                                       }
                                   }
                               }
                               
                               
                               
                               echo "   </td>";
                               "</tr>";
                               $cantidad++;
                           }
                           
						}
                           echo "<tr><td colspan='7'>" . $cantidad . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
			
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modalHistorialSolicitud">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>

<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#filtrar").keyup(function(){		
	var filtroDato=$("#filtrar").val();
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/auxiliar/buscarAuxiliarAjax.php") ."&filtro=\"+filtroDato;\n"; ?>
		$("#resultadosAuxiliares").load(ruta);
	});
});
</script>
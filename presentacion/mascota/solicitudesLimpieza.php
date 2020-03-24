<?php
$auxiliar = new Auxiliar($_SESSION['id']);
$auxiliar->consultar();
$solicitud = new Solicitud();
include 'presentacion/auxiliar/menuAuxiliar.php';
$solicitudes =$solicitud->consultarEsperaLimpieza($_SESSION['id']);
?>
<div class="container">
	<div class="row">
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Solicitudes En Espera De Limpieza</div>
				<div class="card-body">
					
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Estado Proceso</th>
								<th scope="col">Tipo De Solicitud</th>
								<th scope="col">Nombre Mascota</th>
								<th scope="col">Fecha</th>
								<th scope="col">Hora</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadosAuxiliares">
						<?php
						foreach ($solicitudes as $s){
						   
                            echo "<tr>";
                                echo "<td>" . $s-> getId() . "</td>";
                                echo "<td>" . "<div id='EstadoProceso".$s-> getId()."'> <span class='fas " . ($s -> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getEstadoProceso() == 0?"En Espera":"Realizado") . "' ></span>"."</div></td> ";
                                echo "<td>" . $s  -> getTipoSolicitud(). "</td>";
                                echo "<td>" . $s -> getMascota(). "</td>";
                                echo "<td>" . $s -> getFecha() . "</td>";
                                echo "<td>" . $s -> getHora() . "</td>";
                                echo "<td>" . "
                                           <a href='indexAjax.php?pid=". base64_encode("modalAuxiliar.php") . "&idAuxiliar=" . $s  -> getId() . "' data-toggle='modal' data-target='#modalAuxiliar' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span></a>";
                                if($s -> getEstadoProceso()==0)  {
                                    echo "<div id='botonSolicitud".$s-> getId()."'><a id='tareaRealizada".$s-> getId()."' class='fas fa-calendar-check' href='#' data-toggle='tooltip' data-placement='left' title='Realizar'></a></div>";
                                    
                                }else{
                                    echo "<div><a class='fas fa-money-check-alt' href='index.php?pid=". base64_encode("presentacion/mascota/facturaLimpieza.php") . "&idSolicitud=" . $s  -> getId() . "' data-toggle='tooltip' data-placement='left' title='Facturar'> </a></div>";
                                }
                                    
                                  echo "</td>";
                                echo "</tr>";
                                
                        }
                        echo "<tr><td colspan='7'>" . count($solicitudes) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
			
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modalAuxiliar">
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
	<?php foreach ($solicitudes as $s){?>
	$("#tareaRealizada<?php echo $s->getId()?>").click(function(){		
		
		<?php echo "var ruta1 = \"indexAjax.php?pid=" . base64_encode("presentacion/mascota/estadoProcesoAjax.php")."&idSolicitud=".$s->getId()."\";\n"; ?>
		$("#EstadoProceso<?php echo $s->getId()?>").load(ruta1);
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/mascota/solicitudesLimpiezaAjax.php")."&idSolicitud=".$s->getId()."\";\n"; ?>
		$("#botonSolicitud<?php echo $s->getId()?>").load(ruta);
		
		$('[data-toggle="tooltip"]').tooltip('hide');
	});
	<?php }?>
});
</script>
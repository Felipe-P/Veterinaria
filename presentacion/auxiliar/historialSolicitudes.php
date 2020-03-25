<?php
$auxiliar = new Auxiliar($_SESSION['id']);
$auxiliar->consultar();
$solicitud = new Solicitud();
include 'presentacion/auxiliar/menuAuxiliar.php';
$solicitudes =$solicitud->consultarHistorialAuxiliar($_SESSION['id']);
?>
<div class="container col-10">
	<div class="row">
	<div class="col-3"></div>
			<div class="col-5">
			<div class="form-group">
				<input  id="filtrar" type="search"  class="form-control ds-input" placeholder="Digite Tipo De Limpieza" >
			</div>
		</div>
	</div>
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Historial De Solicitues De Limpieza</div>
				<div class="card-body">
					
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Estado Proceso</th>
								<th scope="col">Tipo De Solicitud</th>
								<th scope="col">Nombre Mascota</th>
								<th scope="col">Facturado</th>
								<th scope="col">Fecha</th>
								<th scope="col">Hora</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadoHistorial">
						<?php
						foreach ($solicitudes as $s){
						   
                            echo "<tr>";
                                echo "<td>" . $s-> getId() . "</td>";
                                echo "<td>" . "<span class='fas " . ($s -> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getEstadoProceso() == 0?"En Espera":"Realizado") . "' ></span>"."</td> ";
                                echo "<td>" . $s  -> getTipoSolicitud(). "</td>";
                                echo "<td>" . $s -> getMascota(). "</td>";
                                echo "<td>" . "<span class='fas " . ($s -> getFactura() == ""?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getFactura() == ""?"NO":"SI") . "' ></span>"."</td> ";
                               echo "<td>" . $s -> getFecha() . "</td>";
                                echo "<td>" . $s -> getHora() . "</td>";
                                echo "<td>" . "
                                           <a href='indexAjax.php?pid=". base64_encode("modalHistorialAuxiliar.php") . "&idSolicitud=" . $s  -> getId() . "&idAuxiliar=".$_SESSION["id"]."' data-toggle='modal' data-target='#modalHistorialAuxiliar' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span></a>";
                            
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
<div class="modal" id="modalHistorialAuxiliar">
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
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/auxiliar/historialSolicitudesAjax.php") ."&idAuxiliar=".$_SESSION['id']."&filtro=\"+filtroDato;\n"; ?>
		$("#resultadoHistorial").load(ruta);
	});
});
</script>

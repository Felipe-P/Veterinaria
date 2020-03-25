<?php
$veterinario = new Veterinario($_SESSION['id']);
$veterinario->consultar();
include 'presentacion/veterinario/menuVeterinario.php';
$solicitud =new Solicitud("","","",$_SESSION["id"]);
$solicitudes =$solicitud ->consultarSolicitudes();
?>
<div class="container col-10">
	<div class="row">
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Solicitudes En Espera De <?php echo ($veterinario -> getEspecialidad()=="General"?"Revison":"Tratamiento")?></div>
				<div class="card-body">
					
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Estado Proceso</th>
								<th scope="col">Tipo De Solicitud</th>
								<th scope="col">Facturado</th>
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
                                echo "<td>" . " <span class='fas " . ($s -> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getEstadoProceso() == 0?"En Espera":"Realizado") . "' ></span>"."</td> ";
                                echo "<td>" . $s  -> getTipoSolicitud(). "</td>";
                                echo "<td>" . "<span class='fas " . ($s -> getFactura() == ""?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getFactura() == ""?"NO":"SI") . "' ></span>"."</td> ";
                                echo "<td>" . $s -> getMascota(). "</td>";
                                echo "<td>" . $s -> getFecha() . "</td>";
                                echo "<td>" . $s -> getHora() . "</td>";
                                echo "<td>" . "
                                           <a href='indexAjax.php?pid=". base64_encode("modalSolicitudVeterinario.php") . "&idSolicitud=" . $s  -> getId() . "' data-toggle='modal' data-target='#modalSolicitudVeterinario' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span></a>  ";
                                if($s -> getEstadoProceso()==0)  {
                                    echo "<a class='fas fa-notes-medical' href='index.php?pid=". base64_encode("presentacion/mascota/historialMedico.php") . "&idSolicitud=" . $s  -> getId() . "' data-toggle='tooltip' data-placement='left' title='".($veterinario -> getEspecialidad()=="General"?"Revisar":"Tratar")."'></a>  ";
                                    
                                }else{
                                    echo "<a class='fas fa-money-check-alt' href='index.php?pid=". base64_encode("presentacion/mascota/facturaVeterinario.php") . "&idSolicitud=" . $s  -> getId() . "' data-toggle='tooltip' data-placement='left' title='Facturar'> </a>  ";
                                }
                                echo  "<a class='fas fa-file-medical' href='index.php?pid=".base64_encode("presentacion/mascota/pdfmascota.php") ."&idSolicitud=".$s -> getId()."' data-toggle='tooltip' data-placement='left' title='Historial Medico'> </a>   ";
                                    
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

<div class="modal" id="modalSolicitudVeterinario">
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
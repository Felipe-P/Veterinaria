<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$auxiliar = new Auxiliar();
$auxiliares = $auxiliar->consultarDisponibles();
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Asignar Auxiliar</div>
				<div class="card-body">
			
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Disponibilidad</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadosAuxiliares">
						<?php
                        foreach ($auxiliares as $a) {
                            echo "<tr>";
                            echo "<td>" . $a -> getId() . "</td>";
                            echo "<td>" . $a -> getNombre() . "</td>";
                            echo "<td>" . $a -> getApellido() . "</td>";
                            echo "<td>" . $a -> getCorreo() . "</td>";
                            echo "<td>" . "<span class='fas " . ($a -> getDisponibilidad() == 1?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($a -> getDisponibilidad() == 0?"Disponible":"No Disponible") . "' ></span>"."</td>";
                            echo "<td>" . "<a class='far fa-address-book' href='index.php?pid=" . base64_encode("presentacion/mascota/consultarSolicitudes.php"). "&correcto=true&idAuxiliar=" . $a -> getId() . "&idSolicitud=".$_GET["idSolicitud"]."' data-toggle='tooltip' data-placement='left' title='Agendar'> </a>
                                       
                                   </td>";
                            echo "</tr>";
                        
                        }
                        echo "<tr><td colspan='7'>" . count($auxiliares) . " registros encontrados</td></tr>"?>
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
	$("#filtrar").keyup(function(){		
	var filtroDato=$("#filtrar").val();
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/auxiliar/buscarAuxiliarAjax.php") ."&filtro=\"+filtroDato;\n"; ?>
		$("#resultadosAuxiliares").load(ruta);
	});
});
</script>
<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$veterinario = new Veterinario();
$veterinarios = $veterinario->consultarTodos();
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
	<div class="col-3"></div>
			<div class="col-6">
			<div class="form-group">
				<input  id="filtrar" type="search"  class="form-control ds-input" placeholder="Search" >
			</div>
		</div>
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Veterinario</div>
				<div class="card-body">
					
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Especialidad</th>
								<th scope="col">Disponibilidad</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadosVeterinarios">
						<?php
                        foreach ($veterinarios as $v) {
                            echo "<tr>";
                            echo "<td>" . $v -> getId() . "</td>";
                            echo "<td>" . $v -> getNombre() . "</td>";
                            echo "<td>" . $v -> getApellido() . "</td>";
                            echo "<td>" . $v -> getCorreo() . "</td>";
                            echo "<td>" . $v -> getEspecialidad() . "</td>";
                            echo "<td>" . "<span class='fas " . ($v -> getDisponibilidad() == 0?"fa-check-circle text-success":"fa-times-circle text-danger") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($v -> getDisponibilidad() == 0?"Disponible":"No Disponible") . "' ></span>"."</td>";
                            echo "<td>" . "
                                           <a href='indexAjax.php?pid=". base64_encode("modalVeterinario.php") . "&idVeterinario=" . $v -> getId() . "' data-toggle='modal' data-target='#modalVeterinario' >
                                                <span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                           <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/veterinario/actualizarVeterinario.php") . "&idVeterinario=" . $v -> getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                   </td>";
                            echo "</tr>";
                        
                        }
                        echo "<tr><td colspan='7'>" . count($veterinarios) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modalVeterinario">
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
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/veterinario/buscarVeterinarioAjax.php") ."&filtro=\"+filtroDato;\n"; ?>
		$("#resultadosVeterinarios").load(ruta);
	});
});
</script>
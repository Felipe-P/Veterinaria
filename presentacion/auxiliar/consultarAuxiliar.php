<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$auxiliar = new Auxiliar();
$auxiliares = $auxiliar->consultarTodos();
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
				<div class="card-header bg-primary text-white">Consultar Auxiliares</div>
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
                foreach ($auxiliares as $c) {
                    echo "<tr>";
                    echo "<td>" . $c->getId() . "</td>";
                    echo "<td>" . $c->getNombre() . "</td>";
                    echo "<td>" . $c->getApellido() . "</td>";
                    echo "<td>" . $c->getCorreo() . "</td>";
                    echo "<td>" . "<span class='fas " . ($c->getDsiponible()==0?"fa-check-circle":"fa-times-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($c->getDsiponible()==0?"Disponible":"No Disponible") . "' ></span>"."</td>";
                    echo "<td>" . "<a href='modalAuxiliar.php?idAuxiliar=" . $c->getId() . "' data-toggle='modal' data-target='#modalAuxiliar' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                   <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/auxiliar/actualizarAuxiliar.php") . "&idAuxiliar=" . $c->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                   <a class='fas fa-file-pdf' href='index.php?pid=".base64_encode("presentacion/auxiliar/pdfAuxiliar.php") ."&idAuxiliar=".$c->getId()."' data-toggle='tooltip' data-placement='left' title='Generar PDF'> </a>
                           </td>";
                    echo "</tr>";
                
                }
                echo "<tr><td colspan='6'>" . count($auxiliares) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
			
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="modalAuxiliar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$cliente = new Cliente();
$clientes = $cliente->consultarTodos();
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
				<div class="card-header bg-primary text-white">Consultar Cliente</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Cedula</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadosClientes">
						<?php
                foreach ($clientes as $c) {
                    echo "<tr>";
                    echo "<td>" . $c->getId() . "</td>";
                    echo "<td>" . $c->getNombre() . "</td>";
                    echo "<td>" . $c->getApellido() . "</td>";
                    echo "<td>" . $c->getCorreo() . "</td>";
                    echo "<td>" . $c->getCedula() . "</td>";
                    echo "<td>" . "<a href='modalCliente.php?idCliente=" . $c->getId() . "' data-toggle='modal' data-target='#modalCliente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                   <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/cliente/actualizarCliente.php") . "&idCliente=" . $c->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                   <a class='fas fa-paw' href='index.php?pid=".base64_encode("presentacion/mascota/consultarMascota.php") ."&idCliente=".$c->getId()."&who=a' data-toggle='tooltip' data-placement='left' title='Ver mascotas'> </a>
                           </td>";
                    echo "</tr>";
                
                }
                echo "<tr><td colspan='6'>" . count($clientes) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/cliente/buscarClienteAjax.php") ."&filtro=\"+filtroDato;\n"; ?>
		$("#resultadosClientes").load(ruta);
	});
});
</script>

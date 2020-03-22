<?php
$auxiliar = new Auxiliar();
if(isset($_POST["filtro"])){
    $filtro = $_POST ["filtro"];
    $auxiliares = $auxiliar -> filtrar($_GET["filtro"]);
}else{
    $auxiliares = $auxiliar -> consultarTodos();
}

?>
<div class="container">
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
            foreach ($auxiliares as $a) {
                echo "<tr>";
                echo "<td>" . $a->getId() . "</td>";
                echo "<td>" . $a->getNombre() . "</td>";
                echo "<td>" . $a->getApellido() . "</td>";
                echo "<td>" . $a->getCorreo() . "</td>";
                echo "<td>" . "<span class='fas " . ($a->getDisponibilidad() == 1 ? "fa-check-circle text-success" : "fa-times-circle text-danger") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($a->getDisponibilidad() == 0 ? "Disponible" : "No Disponible") . "' ></span>" . "</td>";
                echo "<td>" . "
                                <a href='indexAjax.php?pid=" . base64_encode("presentacion/auxiliar/modalAuxiliar.php") . "&idAuxiliar=" . $a->getId() . "' data-toggle='modal' data-target='#modalAuxiliar' >
                                    <span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/auxiliar/actualizarAuxiliar.php") . "&idAuxiliar=" . $a->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                <a class='fas fa-file-pdf' href='index.php?pid=" . base64_encode("presentacion/auxiliar/pdfAuxiliar.php") . "&idAuxiliar=" . $a->getId() . "' data-toggle='tooltip' data-placement='left' title='Generar PDF'> </a>
                      </td>";
                echo "</tr>";
            }
            echo "<tr><td colspan='6'>" . count($auxiliares) . " registros encontrados</td></tr>"?>
						</tbody>
		</table>
	</div>
</div>
<?php
$who=0;
if($_GET["who"]=="a"){
    $administrador = new Administrador($_SESSION['id']);
    $administrador->consultar();
    include 'presentacion/administrador/menuAdministrador.php';
}else{
    if($_GET["who"]=="c"){
        $cliente =new Cliente($_SESSION['id']);
        $cliente -> consultar();
        include 'presentacion/cliente/menuCliente.php';
        $who=1;
    }
}


$mascota = new Mascota("","","","","",$_GET['idCliente']);
$mascotas = $mascota->consultarTodos();

?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Mascotas</div>
				<div class="card-body">
					<div id="resultadosPacientes">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Sexo</th>
								<th scope="col">Peso</th>
								<th scope="col">Tipo</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody>
						<?php
                foreach ($mascotas as $m) {
                    echo "<tr>";
                    echo "<td>" . $m->getId() . "</td>";
                    echo "<td>" . $m->getNombre() . "</td>";
                    echo "<td>" . $m->getSexo() . "</td>";
                    echo "<td>" . $m->getPeso() . "</td>";
                    echo "<td>" . $m->getTipo() . "</td>";
                    echo "<td>" . "<a href='modalMascota.php?idMascota=" . $m->getId() . "' data-toggle='modal' data-target='#modalMascota' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>";
                    if($who==1){
                         echo "<a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/mascota/actualizarMascota.php") . "&idMascota=" . $m->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a> ";
                                  
                    }
                         echo  "<a class='fas fa-file-pdf' href='index.php?pid=".base64_encode("presentacion/mascota/pdfmascota.php") ."&idCliente=".$m->getId()."' data-toggle='tooltip' data-placement='left' title='Historial Medico'> </a>
                           </td>";
                    echo "</tr>";
                
                }
                echo "<tr><td colspan='6'>" . count($mascotas) . " registros encontrados</td></tr>";
                if($who==1){
                echo "<tr><td colspan='6'><a class='fas fa-plus' href='index.php?pid=" . base64_encode("presentacion/mascota/registrarMascota.php")."' > </a> <span class='navbar-text'>  Ingresar Una Nueva Mascota</span> </td></tr>";
                   }?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="modalMascota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
	<?php foreach ($clientes as $c) { ?>
	$("#cambiarEstado<?php echo $c -> getId(); ?>").click(function(e){
		e.preventDefault();
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/cliente/editarEstadoPacienteAjax.php") . "&idPaciente=" . $c -> getId() . "&estado=" . (($c -> getEstado() == 0)?"1":"0") . "\";\n"; ?>
		$("#estado<?php echo $c -> getId(); ?>").load(ruta);
	});
	<?php } ?>
});
</script>

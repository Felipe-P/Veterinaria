<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$solicitud = new Solicitud();

include 'presentacion/administrador/menuAdministrador.php';
$error="";
if( isset($_GET["correcto"])){
    $soli = new Solicitud($_GET["idSolicitud"]);
    $soli-> consultarIdMascota();
    $soli = new Solicitud("","","","","","", $soli -> getMascota(), $soli->getFecha());
    $solis = $soli -> consultarDuplicados();
    foreach ($solis as $s){
        
        $s ->actualizarEstadoS(1);
        $limpieza= new Solicitud_Limpieza($s -> getId(), "", $_GET["idAuxiliar"]);
        $limpieza -> ModificarAuxiliar();
        $aux = new Auxiliar( $_GET["idAuxiliar"]);
        $aux -> actualizarDisponibilidad(1);
        
    }
    $aux = new Auxiliar( $_GET["idAuxiliar"]);
    $aux -> consultar();
    $error="El Auxiliar ". $aux -> getNombre(). " Fue Asignado Con Exito";
}
$s=  array();
$s =$solicitud->consultarTodos();
?>
<div class="container">
	<div class="row">
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Solicitudes Pendientes</div>
				<div class="card-body">
			<?php 
					if($error != ""){
					?>
					<div class="alert alert-success" role="alert">
						<?php  echo $error?>
					</div>
					<?php } ?>
					
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Estado Asignacion</th>
								<th scope="col">Tipo De Solicitud</th>
								<th scope="col">Nombre Mascota</th>
								<th scope="col">Fecha</th>
								<th scope="col">Hora</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadosAuxiliares">
						<?php
						$cont=0;
                        for ($i=0;$i<sizeof($s);$i++) {
                            
                            echo "<tr>";
                                echo "<td>" . $s[$i] -> getId() . "</td>";
                                echo "<td>" . "<span class='fas " . ($s[$i] -> getEstadoSolicitud() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s[$i]  -> getEstadoSolicitud() == 0?"Sin Asignar":"Asignado") . "' ></span>"."</td>";
                                echo "<td>" . $s[$i]  -> getTipoSolicitud(). "</td>";
                                echo "<td>" . $s[$i]  -> getMascota(). "</td>";
                                echo "<td>" . $s[$i]  -> getFecha() . "</td>";
                                echo "<td>" . $s[$i]  -> getHora() . "</td>";
                                echo "<td>" . "
                                           <a href='indexAjax.php?pid=". base64_encode("modalAuxiliar.php") . "&idAuxiliar=" . $s[$i]  -> getId() . "' data-toggle='modal' data-target='#modalAuxiliar' >
                                                <span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                           <a class='fas fa-calendar-plus' href='index.php?pid=" . ($s[$i]  -> getTipoSolicitud()=="Limpieza"?base64_encode("presentacion/auxiliar/asignarAuxiliar.php"):base64_encode("presentacion/veterinario/asignarVeterinario.php")) . "&idSolicitud=" . $s[$i]  -> getId() . "' data-toggle='tooltip' data-placement='left' title='". ($s[$i]  -> getTipoSolicitud()=="Limpieza"?"Asignar Auxiliar":"Asignar Veterinario")."'> </a>
                                    
                                   </td>";
                                echo "</tr>";
                                for($j=$i+1;$j<sizeof($s);$j++){
                                    if(($s[$i]->getMascota()==$s[$j]->getMascota()) && ($s[$i]->getFecha()==$s[$j]->getFecha())){
                                        $cont++;
                                    }
                                    
                           }
                            
                           $i=$i+$cont;
                        }
                        echo "<tr><td colspan='7'>" . count($s) . " registros encontrados</td></tr>"?>
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
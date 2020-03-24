<?php
$auxiliar =new Auxiliar($_SESSION['id']);
$auxiliar -> consultar();
$error=0;
include 'presentacion/auxiliar/menuAuxiliar.php';
$solicitud= new Solicitud($_GET["idSolicitud"]);
$solicitud -> consultarParaFactura();
$hora=date("h:i:sa");
$fecha=date("Y-m-d");
if(isset($_POST["registrar"])){
    $factura = new Factura("",$_POST["precio"],$fecha,$hora);
    $factura ->registrar();
    $factura->consultarId();
    $soli= new Solicitud($_GET["idSolicitud"],"","","","",$factura ->getId());
    $soli -> actualizarFactura();
    $error=1;
    $solicitudes =$soli->consultarEsperaLimpieza($_SESSION['id']);
    if(count($solicitudes)==0){
        $auxiliar ->actualizarDisponibilidad(0);
    }
}
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-3"></div>
		<div class="col-4">
			<div class="card">
				<div class="card-header bg-primary text-white">Generar Factura</div>
				<div class="card-body">
				<?php 
					if($error == 1){
					?>
					<div class="alert alert-success" role="alert">
						Factura Generada Con Exito
					</div>
					<?php } else if($error == 2) { ?>
					<div class="alert alert-danger" role="alert">
						error
					</div>
					<?php } ?>
				<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/mascota/facturaLimpieza.php")."&idSolicitud=".$_GET["idSolicitud"] ?> method="post">
						<div class="form-group">
							<b>Tipo Limpieza:  </b><label> <?php echo $solicitud -> getTipoSolicitud()?></label>
							</div>
						<div class="form-group">
							<b>Mascota:  </b><label> <?php echo $solicitud -> getMascota()?></label>
							</div>
							<div class="form-group">
							<b>Fecha Facturacion:  </b><label><?php echo $fecha?></label>
							</div>
							<div class="form-group">
							<b>Hora Facturacion:  </b><label> <?php echo $hora?></label>
							</div>
							<div class="form-group">
						<div class="field is-horizontal">
							<b>Precio  :  </b>
							
							
							
								<?php if(isset($_POST["registrar"])){
								    echo  "<label>".  $factura ->getPrecio()." $</label>";
								}else{
							         ?>
								<p>
									<input class="input" name="precio" type="text" placeholder="Ingrese La Cantidad" required="required">
								</p>
								<?php }?>
							</div>
							</div>
						<?php if(!isset($_POST["registrar"])){
							echo "<button type='submit' name='registrar' class='btn btn-primary'>Registrar</button>";
						}
						?>
					</form>
				</div>
			</div>
		
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#accion").change(function(){
		
	var Dato=$("#accion").val();
	if(Dato!="-----------"){
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/mascota/solicitudAjax.php") ."&idMascota=".$_GET["idMascota"]."&Dato=\"+Dato;\n"; ?>
		$("#respuesta").load(ruta);
		}else{

			$("#respuesta").empty();
			}
		
	});
});
</script>
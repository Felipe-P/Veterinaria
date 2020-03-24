<?php
$cliente =new Cliente($_SESSION['id']);
$cliente -> consultar();
$error=0;
include 'presentacion/cliente/menuCliente.php';
$solicitud= new Solicitud($_GET["idSolicitud"]);
$solicitud -> consultarParaFacturaC();
$tipo=$solicitud ->getTipoSolicitud();
if($solicitud ->getTipoSolicitud()=="Limpieza"){
    $limpieza = new Solicitud_Limpieza($_GET["idSolicitud"]);
    $tipo = $limpieza -> consultartipo();
}
$factura = new Factura($_GET["idFactura"]);
$factura -> consultar();
if(isset($_POST["registrar"])){
    $factura ->actualizarPago(1);
    $factura -> consultar();
    $error=1;
}
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-3"></div>
		<div class="col-4">
			<div class="card">
				<div class="card-header bg-primary text-white">Pagar Factura</div>
				<div class="card-body">
				<?php 
					if($error == 1){
					?>
					<div class="alert alert-success" role="alert">
						Factura Pagada Con Exito
					</div>
					<?php } ?>
					
				<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/mascota/pagarFactura.php")."&idSolicitud=".$_GET["idSolicitud"]."&idFactura=".$_GET["idFactura"] ?> method="post">
						<div class="form-group">
							<b>Tipo Solicitud :  </b><label> <?php echo $tipo?></label>
							</div>
						<div class="form-group">
							<b>Mascota:  </b><label> <?php echo $solicitud -> getMascota()?></label>
							</div>
							<div class="form-group">
							<b>Fecha Facturacion:  </b><label><?php echo $factura -> getFecha()?></label>
							</div>
							<div class="form-group">
							<b>Hora Facturacion:  </b><label> <?php echo $factura -> getHora()?></label>
							</div>
							<div class="form-group">
						<div class="field is-horizontal">
							<b>Precio  :  </b>
							
							
							
								<?php 
								    echo  "<label>".  $factura ->getPrecio()." $</label>";

							         ?>
							</div>
							</div>
						<?php if($factura -> getEstado_pagada()==0){
							echo "<button type='submit' name='registrar' class='btn btn-primary'>Pagar</button>";
						}
						?>
					</form>
				</div>
			</div>
		
		</div>
	</div>
</div>
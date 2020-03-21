<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$cliente = new Cliente($_GET["idCliente"]);
$cliente->consultar();
if (isset($_POST["actualizar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $cliente = new Cliente($_GET["idCliente"], $nombre, $apellido, "", "", $cedula);
    $cliente->actualizar();
}
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-primary text-white">Actualizar Cliente</div>
				<div class="card-body">
						<?php
    if (isset($_POST["actualizar"])) {
        ?>
						<div class="alert alert-success" role="alert">Cliente actualizado
						exitosamente.</div>						
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/cliente/actualizarCliente.php")."&idCliente=".$_GET["idCliente"] ?>
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required"
								value="<?php echo $cliente->getNombre(); ?>">
						</div>
						<div class="form-group">
							<input type="text" name="apellido" class="form-control"
								placeholder="apellido" required="required"
								value="<?php echo $cliente->getApellido(); ?>">
						</div>
						<div class="form-group">
							<input type="text" name="cedula" class="form-control"
								placeholder="Cedula" required="required"
								value="<?php echo $cliente->getcedula(); ?>">
						</div>
						<button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>
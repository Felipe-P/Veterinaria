<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$auxiliar = new Auxiliar($_GET["idAuxiliar"]);
$auxiliar->consultar();
if (isset($_POST["actualizar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $auxiliar = new Auxiliar($_GET["idAuxiliar"], $nombre, $apellido);
    $auxiliar->actualizar();
}
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-primary text-white">Actualizar Auxiliar</div>
				<div class="card-body">
						<?php
    if (isset($_POST["actualizar"])) {
        ?>
						<div class="alert alert-success" role="alert">Auxiliar actualizado
						exitosamente.</div>						
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/auxiliar/actualizarAuxiliar.php")."&idAuxiliar=".$_GET["idAuxiliar"] ?>
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required"
								value="<?php echo $auxiliar->getNombre(); ?>">
						</div>
						<div class="form-group">
							<input type="text" name="apellido" class="form-control"
								placeholder="apellido" required="required"
								value="<?php echo $auxiliar->getApellido(); ?>">
						</div>

						<button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>
<?php
$administrador = new Administrador($_SESSION['id']);
$administrador -> consultar();
include 'presentacion/administrador/menuAdministrador.php';

$error = -1;
$nombre = "";
$apellido = "";
$correo = "";
$clave = "";
$cedula = "";

if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $cedula = $_POST["cedula"];
    
    $cliente = new Cliente("", $nombre, $apellido, $correo, $clave, $cedula);
    if(!$cliente -> existeCorreo()){
        $cliente -> registrar();
        $error = 0;
        $error = 2;
        
    }else{
        $error = 1;
    }
}
?>
<div class="container">
	<div class="row">
    	<div class="col-sm text-white">.</div>
    </div>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-primary text-white">Registrar cliente</div>
				<div class="card-body">
					<?php 
					if($error == 0){
					?>
					<div class="alert alert-success" role="alert">
						Cliente registrado exitosamente.
					</div>
					<?php } else if($error == 1) { ?>
					<div class="alert alert-danger" role="alert">
						El correo <?php echo $correo; ?> ya existe
					</div>
					<?php } ?>
					<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/registrarCliente.php")."&nos=true" ?> method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required" value="<?php echo $nombre; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="apellido" class="form-control" placeholder="Apellido" required="required" value="<?php echo $apellido; ?>">
						</div>
						<div class="form-group">
							<input type="email" name="correo" class="form-control" placeholder="Correo" required="required" value="<?php echo $correo; ?>">
						</div>
						<div class="form-group">
							<input type="password" name="clave" class="form-control" placeholder="Clave" required="required" >
						</div>
						<div class="form-group">
							<input type="text" name="cedula" class="form-control" placeholder="Cedula" required="required" value="<?php echo $cedula; ?>">
						</div>
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
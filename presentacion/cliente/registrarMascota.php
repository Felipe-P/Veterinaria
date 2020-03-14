<?php
$administrador = new Administrador($_SESSION['id']);
$administrador -> consultar();
include 'presentacion/cliente/menuCliente.php';

$error = -1;
$nombre = "";
$sexo = "";
$peso = "";
$f_nacimiento = "";
$codigo = "";
$cliente = "";
$tipo = "";

if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];
    $peso = $_POST["peso"];
    $f_nacimiento = $_POST["f_nacimiento"];
    $codigo = $_POST["codigo"];
    $cliente = $_POST["cliente"];
    $tipo = $_POST["tipo"];
    
    $mascota = new Mascota("", $nombre, $sexo, $peso, $f_nacimiento, $codigo, $cliente, $tipo);
    if(!$mascota -> existeCodigo()){
        $mascota -> registrar();
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
				<div class="card-header bg-primary text-white">Registrar mascota</div>
				<div class="card-body">
					<?php 
					if($error == 0){
					?>
					<div class="alert alert-success" role="alert">
						Mascota registrado exitosamente.
					</div>
					<?php } else if($error == 1) { ?>
					<div class="alert alert-danger" role="alert">
						El codigo <?php echo $codigo; ?> ya existe
					</div>
					<?php } ?>
					<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/cliente/registrarMascota.php")."&nos=true" ?> method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required" value="<?php echo $nombre; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="sexo" class="form-control" placeholder="Sexo" required="required" value="<?php echo $sexo; ?>">
						</div>
						<div class="form-group">
							<input type="email" name="peso" class="form-control" placeholder="Peso" required="required" value="<?php echo $peso; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="f_nacimeinto" class="form-control" placeholder="F_nacimiento" required="required" value="<?php echo $f_nacimiento; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="codigo" class="form-control" placeholder="Codigo" required="required" value="<?php echo $codigo; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="cliente" class="form-control" placeholder="Cliente" required="required" value="<?php echo $cliente; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="tipo" class="form-control" placeholder="Tipo" required="required" value="<?php echo $tipo; ?>">
						</div>
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
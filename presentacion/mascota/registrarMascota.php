<?php
$cliente =new Cliente($_SESSION['id']);
$cliente -> consultar();
include 'presentacion/cliente/menuCliente.php';
$error = -1;
$nombre = "";
$sexo = "";
$peso = "";
$f_nacimiento = "";

$tipo = new tipoMascota();
$tipos = $tipo ->consultarTodos();
if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];
    $peso = $_POST["peso"];
    $f_nacimiento = $_POST["f_nacimiento"];
    $tipo = $_POST["tipo"];
    
    
    if($tipo!="Seleccionar tipo de mascota"){
        $tipo= new tipoMascota("",$_POST["tipo"]);
        $tipo ->consultar();
        $mascota = new Mascota("", $nombre, $sexo, $peso, $f_nacimiento, $_SESSION["id"], $tipo->getId());
        if(!$mascota->existe()){
            $mascota -> registrar();
            $error = 0;
            
        }else{
            $error = 1;
        }
    }else{
        $error=2;
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
						mascota registrada exitosamente.
					</div>
					<?php } else if($error == 1) { ?>
					<div class="alert alert-danger" role="alert">
						La mascota ya existe
					</div>
					<?php }else if($error == 2) {  ?>
					<div class="alert alert-danger" role="alert">
						Seleccione el tipo de mascota
					</div>
					<?php } ?>
					<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/mascota/registrarMascota.php") ?> method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required" value="<?php echo $nombre; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="sexo" class="form-control" placeholder="Sexo" required="required" value="<?php echo $sexo; ?>">
						</div>
						<div class="form-group">
							<input type="number" min="1" name="peso" class="form-control" placeholder="Peso en kg" required="required" value="<?php echo $peso; ?>">
						</div>
						<div class="form-group">
							<input type="date" name="f_nacimiento" class="form-control" placeholder="Fecha de nacimiento" required="required" value="<?php echo $f_nacimiento; ?>">
						</div>
						<div class="form-group">
							<div class="select is-rounded">
								<select name="tipo" required="required">
									<option>Seleccionar tipo de mascota</option>
									<?php 
									foreach ($tipos as $t){
									   echo "<option>".$t->getNombre()." </option>";
									   
									}
									
									
									?>
									
								</select>
							</div>
						</div>
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
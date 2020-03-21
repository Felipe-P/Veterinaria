<?php
$administrador = new Administrador($_SESSION['id']);
$administrador -> consultar();
include 'presentacion/administrador/menuAdministrador.php';

$error = -1;
$nombre = "";
$apellido = "";
$correo = "";
$clave = "";
$especialidad = new Especialidad();
$especialidades = $especialidad ->consultarTodos();

if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $especialidad = $_POST["especialidad"];
    if($especialidad!="Seleccionar Especialidad"){
        $espe = new Especialidad("",$_POST["especialidad"]);
        $espe->consultar();
    $veterinario = new Veterinario("", $nombre, $apellido, $correo, $clave, $espe->getId());
    if(!$veterinario -> existeCorreo()){
        
            $veterinario -> registrar();
            $error = 0;
       
        
       
        
    }else{
        $error = 1;
   }
    }else{
        $error = 2;
        
    }
}
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-primary text-white">Registrar veterinario</div>
				<div class="card-body">
					<?php 
					if($error == 0){
					?>
					<div class="alert alert-success" role="alert">
						Veterinario registrado exitosamente.
					</div>
					<?php } else if($error == 1) { ?>
					<div class="alert alert-danger" role="alert">
						El correo <?php echo $correo; ?> ya existe
					</div>
					<?php }else if($error == 2) {  ?>
					<div class="alert alert-danger" role="alert">
						Seleccione una especialidad
					</div>
					<?php } ?>
					<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/veterinario/registrarVeterinario.php") ?> method="post">
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
							<div class="select is-rounded">
								<select name="especialidad" required="required">
									<option>Seleccionar Especialidad</option>
									<?php 
									foreach ($especialidades as $e){
									   echo "<option>".$e->getNombre()." </option>";
									   
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
</div>
<?php
$cliente =new Cliente($_SESSION['id']);
$cliente -> consultar();
$mascota = new Mascota($_GET["idMascota"]);
$mascota -> consultar();
if (isset($_POST["actualizar"])) {
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];
    $peso = $_POST["peso"];
    $f_nacimiento = $_POST["f_nacimiento"];
    $tip = new Tipo_Mascota("",$_POST["tipo"]);
    $tip->consultar();
    
    $mascota = new Mascota($_GET["idMascota"], $nombre, $sexo, $peso, $f_nacimiento, "", $tip->getId());
    $mascota -> actualizar();
    $mascota -> consultar();
}
$tipo = new Tipo_Mascota();
$tipos = $tipo->consultarTodos();
include 'presentacion/cliente/menuCliente.php';
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-primary text-white">Actualizar mascota</div>
				<div class="card-body">
					<?php
                    if (isset($_POST["actualizar"])) {
                        
                        ?>
                		<div class="alert alert-success" role="alert">Mascota actualizada exitosamente.</div>						
                		<?php } ?>
                		<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/mascota/actualizarMascota.php")."&idMascota=".$_GET["idMascota"] ?> method="post">
                    		<div class="form-group">
                    			<input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required" value="<?php echo $mascota -> getNombre(); ?>">
                    		</div>
                    		<div class="form-group">
							<div class="select is-rounded">
								<select name="sexo" required="required">
									<option><?php echo $mascota->getSexo()?></option>
								
									<option><?php echo ($mascota->getSexo()=="Hembra"?"Macho":"Hembra");?> </option>
								</select>
							</div>
						</div>
                    		
                    		<div class="form-group">
                    			<input type="text" name="peso" class="form-control" placeholder="Peso" required="required" value="<?php echo $mascota -> getPeso(); ?>">
                    		</div>
                    		<div class="form-group">
                    			<input type="text" name="f_nacimiento" class="form-control" placeholder="Fecha de Nacimiento" required="required" value="<?php echo $mascota -> getF_nacimiento(); ?>">
                    		</div>
                    		<div class="form-group">
							<div class="select is-rounded">
								<select name="tipo" required="required">
									<option><?php echo $mascota->getTipo()?></option>
									<?php 
									foreach ($tipos as $t){
									    if($t->getNombre()!=$mascota->getTipo()){
									        echo "<option>".$t->getNombre()." </option>";
									    }									 								   
									}									
									?>
								
								</select>
							</div>
						</div>
                    		
                    		<button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                		</form>
				</div>
			</div>
		</div>
	</div>
</div>
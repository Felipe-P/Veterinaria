<?php
$veterinario = new Veterinario($_SESSION['id']);
$veterinario->consultar();
include 'presentacion/veterinario/menuVeterinario.php';
$solicitud =new Solicitud($_GET["idSolicitud"]);
$solicitud -> consultar();
$mascota = new Mascota($solicitud -> getMascota());
$mascota -> consultarTodo();
$fecha=date("Y-m-d");
$error=0;
if(isset($_POST["generar"])){
    $observacion=$_POST["observacion"];
    $tratamiento=$_POST["tratamiento"];

    if(isset($_POST["diagnostico"])){
        $diagnostico=$_POST["diagnostico"];
        if($tratamiento=="Si"){
            if($_POST["veterinario"]!="------------"){
                $tratamiento="Necesita tratamiento con un ".$_POST["veterinario"];
                $soli= new Solicitud("", 0,0,"",3, "",$mascota -> getId(),date("Y-m-d"),date("h:i:sa"),$_POST["veterinario"] );
                $soli -> registraraux();
                $reporte= new reporteClinico("",$fecha,$diagnostico,$tratamiento,$observacion, $mascota -> getId());
                $reporte -> registrar();
                $solicitudM =new Solicitud($_GET["idSolicitud"],1);
                $solicitudM -> actualizarEstadoP();
                $error=1;
            }else{
                $error=2;
            }
            
        }else{
            $tratamiento="No necesita un tratamiento";
            $reporte= new reporteClinico("",$fecha,$diagnostico,$tratamiento,$observacion, $mascota -> getId());
            $reporte -> registrar();
            $solicitudM =new Solicitud($_GET["idSolicitud"],1);
            $solicitudM -> actualizarEstadoP();
            $error=1;
        }
        
    }else{
        $reporte= new reporteClinico("",$fecha,"Sin Diagnostico",$tratamiento,$observacion, $mascota -> getId());
        $reporte -> registrar();
        $error=1;
        $solicitudM =new Solicitud($_GET["idSolicitud"],1);
        $solicitudM -> actualizarEstadoP();
    }
}
?>
<div class="container">
	<div class="row">
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Reporte Clinico</div>
				<div class="card-body">
				<?php 
					if($error == 1){
					?>
					<div class="alert alert-success" role="alert">
						Reporte Clinico Registrado Exitosamente
					</div>
					<?php } else if($error == 2) { ?>
					<div class="alert alert-danger" role="alert">
						Seleccione una especialidad
					</div>
					<?php } ?>
				<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/mascota/historialMedico.php")."&idSolicitud=".$_GET["idSolicitud"]?> method="post">
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Fecha : </label>
						</div>
						<div class="field-body">
							<div class="field">
							<p><?php echo $fecha?></p> 
							</div>
						</div>
					</div>
					
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Mascota : </label>
						</div>
						<div class="field-body">
							<div class="field">
							<p><?php echo $mascota -> getNombre()?></p> 
							</div>
							<div class="field-label is-normal">
							<label class="label">Tipo : </label>
						</div>
						<div class="field-body">
							<div class="field">
							<p><?php echo $mascota -> getTipo()?></p> 
							</div>
						
						</div>
						</div>
						</div>
						<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Sexo : </label>
						</div>
						<div class="field-body">
							<div class="field">
							<p><?php echo $mascota -> getSexo()?></p> 
							</div>
							<div class="field-label is-normal">
							<label class="label">Cliente : </label>
						</div>
						<div class="field-body">
							<div class="field">
							<p><?php echo $mascota -> getCliente()?></p> 
							</div>
						
						</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Fecha Nacimiento : </label>
						</div>
						<div class="field-body">
							<div class="field">
							<p><?php echo $mascota -> getF_nacimiento()?></p> 
							</div>
							<div class="field-label is-normal">
							<label class="label">Peso : </label>
						</div>
						<div class="field-body">
							<div class="field">
							<p><?php echo $mascota -> getPeso()?> Kg</p> 
							</div>
						
						</div>
						</div>
					</div>
					<?php if($veterinario -> getEspecialidad()=="General"){?>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Diagnostico</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="diagnostico" required="required"
										placeholder="Diagnostico De La Mascota"></textarea>
								</div>
							</div>
						</div>
					</div>
					

					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label">Necesita Tratamiento?</label>
						</div>
						<div class="field-body">
							<div class="field is-narrow">
								<div class="control">
									<label class="radio"> <input id="accion" type="radio" name="tratamiento" value="Si" required="required"> Si</label>
									 <label class="radio"> <input id="accion1" type="radio" name="tratamiento" value="No" required="required"> No</label>
								</div>
							</div>
						</div>
					</div>
					<div id="contenedor">
					
					</div>

						<?php }else{?>
						 <div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Tratamiento</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="tratamiento" required="required"
										placeholder="Tratamiento De La Mascota"></textarea>
								</div>
							</div>
						</div>
					</div>
						
						<?php }?>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Observaciones</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<input class="input" type="text" required="required" name="observacion"
										placeholder="Observaciones Del Tratamiento O Diagnostico">
								</div>
							</div>
						</div>
					</div>

					
					<?php if(!isset($_POST["generar"])){?>
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<button type="submit" name="generar" class="button is-primary">Generar Reporte Clinico</button>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</form>	
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#accion").change(function(){
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/mascota/historialMedicoAjax.php")."\";\n"; ?>
		$("#contenedor").load(ruta);
		
	});
	$("#accion1").change(function(){
				$("#contenedor").empty();
			
		});
});
</script>
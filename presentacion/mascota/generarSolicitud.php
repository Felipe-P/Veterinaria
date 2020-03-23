<?php
$cliente =new Cliente($_SESSION['id']);
$cliente -> consultar();
include 'presentacion/cliente/menuCliente.php';
$tipoS =new Tipo_Solicitud();
$tiposS = $tipoS ->consultarTodos();
$error=0;
if(isset($_GET["idsolicitud"])){
    $tipo = new Tipo_Solicitud("",$_GET["idsolicitud"]);
    $tipo ->consultar();
    if($_GET["idsolicitud"]=="Limpieza"){
        $solicitud= new Solicitud("", 0,0,"",$tipo ->getId(), "",$_GET["idMascota"],date("Y-m-d"),date("h:i:sa") );
        $solicitud -> registrar();
        $solicitud -> consultarID();
        $Solicitud_limpieza = new Solicitud_Limpieza($solicitud -> getId(),$_GET["solicitar"]);
        $Solicitud_limpieza ->registrar();
        $error=1;
    }else{
        if($_GET["idsolicitud"]=="Revision"){
            $solicitud= new Solicitud("", 0,0,"",$tipo ->getId(), "",$_GET["idMascota"],date("Y-m-d"),date("h:i:sa") );
            $solicitud -> registrar();
            $error=1;
        }else{
            if($_GET["idsolicitud"]=="Tratamiento"){
                $solicitud= new Solicitud("", 0,0,"",$tipo ->getId(), "",$_GET["idMascota"],date("Y-m-d"),date("h:i:sa") );
                $solicitud -> registrar();
                $error=1;
            }else{
                $error=2;
            }
        }
    }
}

?>
<div class="container">
	<div class="row mt-4">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-primary text-white">Generar Solicitud</div>
				<div class="card-body">
				<?php 
					if($error == 1){
					?>
					<div class="alert alert-success" role="alert">
						Solicitud Generada
					</div>
					<?php } else if($error == 2) { ?>
					<div class="alert alert-danger" role="alert">
						error
					</div>
					<?php } ?>
				<div class="form-group">
						<div>
						<label> Seleccione Un Tipo De Solicitud  :   </label>
						</div>
						
							<div class="select is-rounded">
								<select name="tipo" required="required" id="accion">
									<option>-----------</option>
									<?php 
									foreach ($tiposS as $t){
									  
									        echo "<option>".$t->getNombre()." </option>";
									    								 								   
									}									
									?>
								
								</select>
							</div>
						</div>

					<div id="respuesta"></div>
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
	
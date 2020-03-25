<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$veterinario = new Veterinario();
$general= $veterinario->consultarCantidadVeterinarioGeneral();
$diferen = $veterinario -> consultarCantidadVeterinario();
$auxiliar = new Auxiliar();
$cantidad = $auxiliar -> consultarCantidad();
$solicitud = new Solicitud();
$solicitudes = $solicitud ->DiaMasProductivo();
$mascota = new Mascota();
$mascotas =$mascota -> consultarTiposMascotasSolicitudes();
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container col-8">

<div class="row">
	<div class="col-2"></div>
	<div class="col-8">
	<div class="card" >
  <div class="card-content">
    <p class="title">
      "Servicios mas solicitados"
    </p>
    <div id="PersonalMasRecurrido">
    <?php 
                    echo "<script>";
                        $json="[";
                
                     $json .= "[\"Veterinario General\",".$general."],";	    
                     $json .= "[\"Otras Especialidades\",".$diferen."],";
                     $json .= "[\"Auxiliar\",".$cantidad."]";
                    	$json .= "]";
                    	echo "new Chartkick.PieChart(\"PersonalMasRecurrido\", " . $json . ")";
                        echo "</script>";
                    ?>		

	</div>
</div>
	</div>
	</div>
</div>
	<div class="row mt-4">
	<div class="col-2"></div>
	
	<div class="col-8">
	<div class="card">
  <div class="card-content">
    <p class="title">
      "Dias Productivos"
    </p>
    <div id="DiaMasProductivo">
    <?php 
                        echo "<script>";
                        $json="[";
                        for ($i=0; $i<count($solicitudes); $i++) {
                            $json .= "[\"" . $solicitudes[$i][0]. "\", ".$solicitudes[$i][1]."],";	    
                    	}
                    	$json .= "]";
                    	echo "new Chartkick.LineChart(\"DiaMasProductivo\", " . $json . ")";
                        echo "</script>";
                    ?>		
	</div>
  </div>
</div>
	</div>
	</div>
<div class="row mt-4">
	<div class="col-2"></div>
	<div class="col-8">
	<div class="card">
  <div class="card-content">
    <p class="title">
      "Cantidad De Solicitudes Realizadas Por Los Diferentes Tipos De Mascotas"
    </p>
    <div id="TipoMascotas">
    <?php 
                        echo "<script>";
                        $json="[";
                        for ($i=0; $i<count($mascotas); $i++) {
                            $json .= "[\"" . $mascotas[$i][0]. "\", ".$mascotas[$i][1]."],";	    
                    	}
                    	$json .= "]";
                    	echo "new Chartkick.ColumnChart(\"TipoMascotas\", " . $json . ")";
                        echo "</script>";
                    ?>		
	</div>
  </div>
</div>
	</div>
	</div>
</div>


	
	
	

</div>
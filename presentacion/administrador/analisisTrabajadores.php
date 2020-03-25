<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$veterinario = new Veterinario();
$veterinarios= $veterinario->losMasTrabajadores();
$auxiliar = new Auxiliar();
$auxiliares = $auxiliar -> losMasTrabajadores();
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container col-8">

<div class="row">
	<div class="col-2"></div>
	<div class="col-8">
	<div class="card" >
  <div class="card-content">
    <p class="title">
      "Cantidad De Solicitudes Realizadas Por Auxiliares"
    </p>
    <div id="TrabajadoresAuxiliares">
    <?php 
                    echo "<script>";
                        $json="[";
                        for ($i=0; $i<count($auxiliares); $i++) {
                            $json .= "[\"" . $auxiliares[$i][0]. " ".$auxiliares[$i][1]."\", ".$auxiliares[$i][2]."],";
                        }
                    	$json .= "]";
                    	echo "new Chartkick.BarChart(\"TrabajadoresAuxiliares\", " . $json . ")";
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
      "Cantidad De Solicitudes Realizadas Por Veterinarios"
    </p>
    <div id="DiaMasProductivo">
    <?php 
                        echo "<script>";
                        $json="[";
                        for ($i=0; $i<count($veterinarios); $i++) {
                            $json .= "[\"" . $veterinarios[$i][0]. " ".$veterinarios[$i][1]."\", ".$veterinarios[$i][2]."],";
                        }
                    	$json .= "]";
                    	echo "new Chartkick.BarChart(\"DiaMasProductivo\", " . $json . ")";
                        echo "</script>";
                    ?>		
	</div>
  </div>
</div>
	</div>
	</div>

</div>
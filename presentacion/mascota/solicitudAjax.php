<?php

if($_GET["Dato"]=="Limpieza"){
   $limpieza = new Limpieza();
   $limpiezas = $limpieza -> consultarTodos();
?>

	<?php 
	$solicitud = new Solicitud("","","","","","",$_GET["idMascota"]);
	if(!$solicitud -> verificarParaLimpieza()){
	    echo "<table class='table table-striped table-hover'>
	    <thead>
	    <tr>
        <th scope='col'>Tipo Limpieza</th>
	    <th scope='col'>Solicitar</th>
	    </tr>
	    </thead>
	    <tbody>";
	    foreach ($limpiezas as $l){
	        
	        echo "<tr><td>". $l->getTipo() . "</td><td>";
	        if(!$l->autenticar($_GET["idMascota"])){
	            
	            echo "<a class='fas fa-check' href='index.php?pid=".base64_encode("presentacion/mascota/generarSolicitud.php")."&idMascota=".$_GET["idMascota"]."&idsolicitud=".$_GET["Dato"]."&solicitar=". $l->getId()."'></a>";
	            
	        }else{
	            echo "Ya Solicitado";
	            
	        }
	        
	        
	        
	    }
	    echo "</td></tr>
                  </tbody>
	               </table>";
	
	}else{
	    echo "<div class='alert alert-danger' role='alert'>
                Su Mascota Esta En Proceso De Solicitud
                </div>";
	
	}
	
	
	?>
	

<?php
} else if ($_GET["Dato"] == "Revision") {
    
    $solicitud = new Solicitud("","","","","","",$_GET["idMascota"]);
            if(! $solicitud -> verificar()){
                echo "<a class='button is-link' href='index.php?pid=".base64_encode("presentacion/mascota/generarSolicitud.php")."&idMascota=".$_GET["idMascota"]."&idsolicitud=".$_GET["Dato"]."'>Solicitar</a>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>
                Su Mascota Esta En Proceso De Solicitud
                </div>";
            }
    ?>




<?php 
}else if($_GET["Dato"]=="Tratamiento"){
    $solicitud = new Solicitud("","","","","","",$_GET["idMascota"]);
    if(! $solicitud -> verificar()){
        echo "<a class='button is-link' href='index.php?pid=".base64_encode("presentacion/mascota/generarSolicitud.php")."&idMascota=".$_GET["idMascota"]."&idsolicitud=".$_GET["Dato"]."'>Solicitar</a>";
    }else{
        echo "<div class='alert alert-danger' role='alert'>
                Su Mascota Esta En Proceso De Solicitud
                </div>";
    }


}
    
?>

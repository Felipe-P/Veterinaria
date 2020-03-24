<?php
$solicitud= new Solicitud();
$solicitudes = $solicitud -> filtroHistorialAuxiliar($_GET["filtro"],$_GET["idAuxiliar"]);
						foreach ($solicitudes as $s){
						   
                            echo "<tr>";
                                echo "<td>" . $s-> getId() . "</td>";
                                echo "<td>" . "<span class='fas " . ($s -> getEstadoProceso() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getEstadoProceso() == 0?"En Espera":"Realizado") . "' ></span>"."</td> ";
                                echo "<td>" . $s  -> getTipoSolicitud(). "</td>";
                                echo "<td>" . $s -> getMascota(). "</td>";
                                echo "<td>" . "<span class='fas " . ($s -> getFactura() == ""?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s  -> getFactura() == ""?"NO":"SI") . "' ></span>"."</td> ";
                               echo "<td>" . $s -> getFecha() . "</td>";
                                echo "<td>" . $s -> getHora() . "</td>";
                                echo "<td>" . "
                                           <a href='indexAjax.php?pid=". base64_encode("modalAuxiliar.php") . "&idAuxiliar=" . $s  -> getId() . "' data-toggle='modal' data-target='#modalAuxiliar' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span></a>";
                            
                                  echo "</td>";
                                echo "</tr>";
                                
                        }
                        echo "<tr><td colspan='7'>" . count($solicitudes) . " registros encontrados</td></tr>"?>
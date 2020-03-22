<?php 
$auxiliar = new Auxiliar();
$auxiliares = $auxiliar->filtro($_GET["filtro"]);
?>
<?php
                foreach ($auxiliares as $c) {
                    echo "<tr>";
                    echo "<td>" . $c->getId() . "</td>";
                    echo "<td>" . $c->getNombre() . "</td>";
                    echo "<td>" . $c->getApellido() . "</td>";
                    echo "<td>" . $c->getCorreo() . "</td>";
                    echo "<td>" . "<span class='fas " . ($c->getDsiponibilidad()==0?"fa-check-circle":"fa-times-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($c->getDsiponible()==0?"Disponible":"No Disponible") . "' ></span>"."</td>";
                    echo "<td>" . "<a href='modalAuxiliar.php?idAuxiliar=" . $c->getId() . "' data-toggle='modal' data-target='#modalAuxiliar' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                   <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/auxiliar/actualizarAuxiliar.php") . "&idAuxiliar=" . $c->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                   <a class='fas fa-file-pdf' href='index.php?pid=".base64_encode("presentacion/auxiliar/pdfAuxiliar.php") ."&idAuxiliar=".$c->getId()."' data-toggle='tooltip' data-placement='left' title='Generar PDF'> </a>
                           </td>";
                    echo "</tr>";
                
                }
                echo "<tr><td colspan='6'>" . count($auxiliares) . " registros encontrados</td></tr>"?>
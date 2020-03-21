<?php 
$veterinario = new Veterinario();
$veterinarios = $veterinario -> filtro($_GET["filtro"]);
?>
<?php
                foreach ($veterinarios as $v) {
                    echo "<tr>";
                    echo "<td>" . $v->getId() . "</td>";
                    echo "<td>" . $v->getNombre() . "</td>";
                    echo "<td>" . $v->getApellido() . "</td>";
                    echo "<td>" . $v->getCorreo() . "</td>";
                    echo "<td>" . $v->getEspecialidad() . "</td>";
                    echo "<td>" . "<span class='fas " . ($v->getDsiponibilidad()==0?"fa-check-circle":"fa-times-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($v->getDsiponible()==0?"Disponible":"No Disponible") . "' ></span>"."</td>";
                    echo "<td>" . "<a href='modalVeterinario.php?idVeterinarior=" . $v->getId() . "' data-toggle='modal' data-target='#modalVeterinario' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                   <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/veterinario/actualizarVeterinario.php") . "&idVeterinario=" . $v->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                   <a class='fas fa-file-pdf' href='index.php?pid=".base64_encode("presentacion/veterinario/pdfVeterinario.php") ."&idVeterinario=".$v->getId()."' data-toggle='tooltip' data-placement='left' title='Generar PDF'> </a>
                           </td>";
                    echo "</tr>";                
                }
                echo "<tr><td colspan='6'>" . count($veterinarios) . " registros encontrados</td></tr>"?>
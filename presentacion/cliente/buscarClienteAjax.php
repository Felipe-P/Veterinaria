<?php 
$cliente = new Cliente();
$clientes = $cliente->filtro($_GET["filtro"]);
?>

<?php
                foreach ($clientes as $c) {
                    echo "<tr>";
                    echo "<td>" . $c->getId() . "</td>";
                    echo "<td>" . $c->getNombre() . "</td>";
                    echo "<td>" . $c->getApellido() . "</td>";
                    echo "<td>" . $c->getCorreo() . "</td>";
                    echo "<td>" . $c->getCedula() . "</td>";
                    echo "<td>" . "<a href='modalCliente.php?idCliente=" . $c->getId() . "' data-toggle='modal' data-target='#modalCliente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                   <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/cliente/actualizarCliente.php") . "&idCliente=" . $c->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                   <a class='fas fa-paw' href='index.php?pid=".base64_encode("presentacion/mascota/consultarMascota.php") ."&idCliente=".$c->getId()."' data-toggle='tooltip' data-placement='left' title='Ver mascotas'> </a>
                           </td>";
                    echo "</tr>";
                
                }
                echo "<tr><td colspan='6'>" . count($clientes) . " registros encontrados</td></tr>"?>
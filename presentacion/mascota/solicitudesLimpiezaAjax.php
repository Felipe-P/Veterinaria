<?php
echo "<div><a class='fas fa-money-check-alt' href='index.php?pid=". base64_encode("presentacion/mascota/facturaLimpieza.php") . "&idSolicitud=" . $_GET["idSolicitud"]. "' data-toggle='tooltip' data-placement='left' title='Facturar'> </a></div>";
?>
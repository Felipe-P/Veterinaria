<?php
$correo = $_POST["correo"];
$clave = $_POST["clave"];

$cliente = new Cliente("", "", "", $correo, $clave, "");
$auxiliar = new Auxiliar("", "", "", $correo, $clave);
$veterinario = new Veterinario("", "", "", $correo, $clave, "");
$administrador = new Administrador("", "", "", $correo, $clave);

if ($administrador -> autenticar()) {
    $_SESSION['id'] = $administrador -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/administrador/sesionAdministrador.php"));
}else{
    if($veterinario -> autenticar()){
        $_SESSION['id'] = $veterinario -> getId();
        header("Location: index.php?pid=" . base64_encode("presentacion/veterinario/sesionVeterinario.php"));
    } else if($auxiliar -> autenticar()){
            $_SESSION['id'] = $auxiliar -> getId();
            header("Location: index.php?pid=" . base64_encode("presentacion/auxiliar/sesionAuxiliar.php"));
        } else if($cliente -> autenticar()){
                $_SESSION['id'] = $cliente -> getId();
                header("Location: index.php?pid=" . base64_encode("presentacion/cliente/sesionCliente.php"));
            } else {
                    header("Location: index.php?pid=" . base64_encode("presentacion/inicio.php") . "&error=true &nos=true");
                }
}




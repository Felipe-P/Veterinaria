<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand"
		href="index.php?pid=<?php echo base64_encode("presentacion/administrador/sesionAdministrador.php")?>"><i
		class="fas fa-home"></i></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Registrar </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/veterinario/registrarVeterinario.php")?>">Veterinario</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/auxiliar/registrarAuxiliar.php")?>">Profesor</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/registrarCliente.php")?>">Profesor</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Consultar </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/veterinario/consultarVeterinario.php")?>">Veterinario</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/auxiliar/consultarAuxiliar.php")?>">Auxiliar</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarCliente.php")?>">Cliente</a>
					</div>
			</li>
			<li class="nav-item"><a class="nav-link" href="index.php">Salida</a></li>
		</ul>
		<span class="navbar-text">
      Administrador: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?> 
    </span>
	</div>
</nav>
<nav class="navbar is-white">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/sesionCliente.php")?>">
      <img src="img/Logo.png" alt="Logotipo perron" width="65px" height="35px">
      <span class="navbar-text">Veterinaria Felipe y Stiven S.A</span>
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          
          <p class="control">
            <span class="navbar-text">
      Usuario: <?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?>  </span>
          </p>
          <p class="control">
            <a class="bd-tw-button button" href="index.php" >
              <span>
                Salida
              </span>
            </a>
          </p>
        </div>
      </div>
    </div>
</nav>
	<div class="row">
	<div class="col-2">
	<div class="card">
	<div class="card-body">
		
			<aside class="menu">
				<p class="menu-label">Ver</p>
				<ul class="menu-list">
					<li><a href=<?php echo "index.php?pid=". base64_encode("presentacion/mascota/consultarMascota.php"). "&who=c&idCliente=".$_SESSION['id']?>>Mascotas</a></li>
				</ul>
				<p class="menu-label">Consultar</p>
				<ul class="menu-list">
				</ul>
				<p class="menu-label">Analisis</p>
				<ul class="menu-list">
					<li><a>Payments</a></li>
					<li><a>Transfers</a></li>
					<li><a>Balance</a></li>
				</ul>
			</aside>
		</div>
		</div>
	</div>
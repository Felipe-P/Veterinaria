<nav class="navbar is-white">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?pid=<?php echo base64_encode(administrador/sesionAdministrador.php)?>">
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
      Administrador: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?>  </span>
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
  </div>
</nav>
<!-- <div class="Container"> -->
	<div class="row">
	<div class="col-3">
	<div class="card">
	<div class="card-body">
		
			<aside class="menu">
				<p class="menu-label">General</p>
				<ul class="menu-list">
					<li><a>Dashboard</a></li>
					<li><a>Customers</a></li>
				</ul>
				<p class="menu-label">Administration</p>
				<ul class="menu-list">
					<li><a>Team Settings</a></li>
					<li><a class="is-active">Manage Your Team</a>
						<ul>
							<li><a>Members</a></li>
							<li><a>Plugins</a></li>
							<li><a>Add a member</a></li>
						</ul></li>
					<li><a>Invitations</a></li>
					<li><a>Cloud Storage Environment Settings</a></li>
					<li><a>Authentication</a></li>
				</ul>
				<p class="menu-label">Transactions</p>
				<ul class="menu-list">
					<li><a>Payments</a></li>
					<li><a>Transfers</a></li>
					<li><a>Balance</a></li>
				</ul>
			</aside>
		</div>
		</div>
	</div>
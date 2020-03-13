<div class="container">
	<div class="row">
			<?php include 'encabezado.php';?>
	</div>
	<div class="row">
    	<div class="col-sm text-white">.</div>
    </div>
	<div class="row">
		<div class="col-8">
			<div class="card">
				<div class="card-body">
					<img src="imagenes/inicio.jpg" width="100%">
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card">
			<div class="row"> </div>
				<div class="card-header bg-info text-white">Inicio de Sesion</div>
				<div class="card-body">
					<?php
					if (isset($_GET['error'])) {
						echo "<div class='alert alert-danger' role='alert'>";
						echo "Los datos ingresados son incorrectos. Por favor intentelo nuevamente.";
						echo "</div>";
					}
					?>
						<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true" method="post">
						<div class="form-group">
							<input type="email" name="correo" class="form-control" placeholder="Correo" required="required">
						</div>
						<div class="form-group">
							<input type="password" name="clave" class="form-control" placeholder="Clave" required="required">
						</div>
						<button type="submit" class="btn btn-info">Ingresar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
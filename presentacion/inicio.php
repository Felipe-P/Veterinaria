<div class="container">
<div class="row">
<?php include 'encabezado.php';?>
</div>

	<div class="row">
    	<div class="col-sm text-white">.</div>
    </div>
	<div class="row">
		<div class="col-8">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0"
								class="active text-dark"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="img/incio0.jpg" class="d-block w-100" alt="" height="450">
							</div>
							<div class="carousel-item">
								<img src="img/inicio1.jpg" class="d-block w-100" alt="" height="450">
							</div>
							<div class="carousel-item">
								<img src="img/inicio2.jpg" class="d-block w-100" alt="" height="100">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators"
							role="button" data-slide="prev"> <span
							class="carousel-control-prev-icon" aria-hidden="true"></span> <span
							class="sr-only">Anteriror</span>
						</a> <a class="carousel-control-next"
							href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
					</div>
				</div>
		<div class="col-4">
			<div class="card">
			<div class="row"> </div>
				<div class="card-header bg-dark text-white">Inicio de Sesion</div>
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
						<button type="submit" class="btn btn-dark">Ingresar</button>
					</form>
					
					<a href=<?php echo "index.php?pid=" . base64_encode("presentacion/registro.php") . "&nos=true" ?>>Registrese Gratis</a>	
				</div>
			</div>
			<div class="text-center mt-4" >
			<cite title="Source Title" ">"No te precupes, Nostros lo cuidamos por ti"</cite>
			</div>
			 
		</div>
	</div>
</div>
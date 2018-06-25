<?php 
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
/*require_once $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/clases/includes.php";*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once $HEADER_DIR;?>
</head>

<body>

	<?php require_once $NAVBAR1_DIR; ?>

	<div class="container">



		<div class="container">
			<div class="col-md-6">


				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Iniciar Sesión</h3>
					</div>
					<div class="panel-body">
						<P>Complete los campos:</P>

						<form class="form" role="form" method="post" action="<?php echo $VALIDAR_LOGIN_HOST ?>" accept-charset="UTF-8" id="login-nav">

							<div class="form-group">

								<label class="sr-only" for="exampleInputEmail2">Usuario</label>

								<div class="input-group">
									<span class="input-group-addon">Usuario</span>
									<input type="text" name="user" class="form-control" id="exampleInputEmail2" required>
								</div>
							</div>

							<div class="form-group">

								<label class="sr-only" for="exampleInputPassword2">Contraseña</label>

								<div class="input-group">
									<span class="input-group-addon">Clave</span>
									<input type="password" name="pass" class="form-control" id="exampleInputPassword2" required>
								</div>

								<div class="help-block text-right"><a href="olvidopass.php">¿Olvidó su clave?</a></div>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"> Recordar mis datos
								</label>
							</div>
							<div class="form-group">
								<button type="submit" name="enviar" class="btn btn-primary btn-block">Iniciar Sesión</button>
							</div>
						</form>
					</div>
				</div>


			</div>
		</div>
	</div>


</div>
</body>

<footer>
	<?php require_once '../helpers/inc/footer.php'; ?>
</footer>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<title>Login</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">RU</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="/">Dashboard</a>
				<a class="nav-item nav-link active" href="/login">Login</a>
			</div>
		</div>
	</nav>


	<div class="card">
		<div class="card-header">
			<h3>Sign In</h3>
		</div>
		<div class="card-body">
			<?php if ($_SESSION["login-error"] ?? null) : ?>
				<div style="background: #fafae1; padding: 15px; margin-bottom: 24px;">
					📢 Usuário ou Senha inválidos! Tente novamente.
				</div>
			<?php endif; ?>
			<form method="POST">
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text">👤</i></span>
					</div>
					<input type="text" class="form-control" placeholder="username" name="user" value="<?= $_SESSION["login-error-autofill-user"] ?? null ?>">

				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text">🔑</i></span>
					</div>
					<input type="password" class="form-control" placeholder="password" name="password" value="<?= $_SESSION["login-error-autofill-password"] ?? null ?>">
				</div>
				<div class="form-group">
					<input type="submit" value="Login" class="btn float-right login_btn">
				</div>
			</form>
		</div>
	</div>
	</div>

</html>
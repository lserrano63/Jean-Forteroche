<?php $title= "Se connecter / Admin";
if (isset($_POST["name"]) && strtolower($_POST["name"]) == "jean" ){
if (isset($_POST["password"]) &&  password_verify($_POST["password"], '$2y$10$sIGNT2Wp9ml93ribg8qRTONt/vPJx7thWWExq8gj1zUhsyVZpXYVi')){	
	session_start();		
	$_SESSION['connected'] = true;
} else {
	echo 'pass non valide';
	}
}	
?>
<?php ob_start(); ?>	
<section id="login" class="container">
	<div class="card card-container">
		<h2 class="card-header">Connexion</h2>
		<div class="card-body">
			<div class="login-form">
				<form action="login.php" method="post">
					<div class="form-group">
						<label for="pseudo">Pseudo :</label>
						<input name="name" type="text" id="name" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="password">Mot de Passe :</label>
						<input type="password" name="password" id="password" class="form-control" required/>
					</div>
					<input type="submit" name="connection" class="btn btn-primary" value="Connexion"/>
				</form>
			</div>
		</div>
	</div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

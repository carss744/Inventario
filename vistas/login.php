<link href="http://localhost/Inventario/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="http://localhost/Inventario/assets/css/log.css" rel="stylesheet">
<div class="main-container">

	<form class="box login" action="" method="POST" autocomplete="off">
		<h5 class="title titlelogin is-5 has-text-centered is-uppercase">INICIAR SESION</h5>
		<br>
		<div class="field">
			<div class="input-group">
				<div class="input-gruop-text iconlog">
					<i class="fa-solid fa-user"></i>
				</div>
			    <input class="input inputlogin" type="text" id="login_usuario" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" >
			</div>
		</div>
		<br>
		<div class="field">
		<div class="input-group">
				<div class="input-gruop-text iconlog">
				<i class="fa-solid fa-lock"></i>
				</div>
		    	<input class="input inputlogin" type="password" id="login_clave" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100"  >
		  	</div>
		</div><br>

		<p class="has-text-centered mb-4 mt-3">
			<button type="submit" class="button is-rounded loggin">Entrar</button>
		</p>

		<?php
			if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
				require_once "php/main.php";
				require_once "php/iniciar_sesion.php";
			}
		?>
	</form>
</div>
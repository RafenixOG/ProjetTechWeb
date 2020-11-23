<html>
<head><title>Connexion</title></head>
<body>
<p><h1>Examen en ligne</h1></p>
<p><h2>Veuillez vous connecter</h2></p>

<form method="post" action="securite.php">
<p>Login<span class="required">*</span> :<br>
<input type="text" name="login" required></p>
<p>Mot de passe<span class="required">*</span> :<br>
<input type="password" name="mdp" required></p>
<p><input type="submit" name="submit" value="Se connecter"></p>
</form>

<div class="obligation"><span class="required">*</span>Les champs marqués d'une astérisque sont obligatoires.</div>

<?php
if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
	echo "<br><div class=\"loginIcorrect\">Login et/ou mot de passe incorrect</div>";
}
?>
</body>
</html>

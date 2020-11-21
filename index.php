<?php
session_start();
?>
<html>
<head><title>Connexion</title></head>
<body>
<?php
$servername = "localhost";
$username = "connexion";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$login = $mdp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$login = test_input($_POST["login"]);
	$mdp = test_input($_POST["mdp"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<p><h1>Examen en ligne</h1></p>
<p><h2>Veuillez vous connecter</h2></p>
<form method="post" action="dashboard.php">
<p>Login<span class="required">*</span> :<br>
<input type="text" name="login" required></p>
<p>Mot de passe<span class="required">*</span> :<br>
<input type="password" name="mdp" required></p>
<p><input type="submit" name="submit" value="Se connecter"></p>
</form>
<div class="obligation"><span class="required">*</span>Les champs marqués d'une astérisque sont obligatoires.</div>
<?php
if ($login != "" and $mdp != "") {
	$sql = "SELECT * FROM etudiant WHERE login='$login' AND mdp='$mdp';";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$_SESSION["login"] = $row["login"];
			$_SESSION["prenom"] = $row["prenom"];
			$_SESSION["nom"] = $row["nom"];
		}
	}
	else {
		echo "Login et/ou mot de passe incorrect";
	}
}
?>
</body>
</html>

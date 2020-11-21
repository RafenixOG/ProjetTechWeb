<html>
<head><title>Connexion</title></head>
<body>
<?php
$login = $mdp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$login = $_POST["login"];
	$mdp = $_POST["mdp"];
}
?>
<p><h1>Examen en ligne</h1></p>
<p><h2>Veuillez vous connecter</h2></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>Login :<br>
<input type="text" name="login"></p>
<p>Mot de passe:<br>
<input type="text" name="mdp"></p>
<p><input type="submit" name="submit" value="Se connecter"></p>
</form>
<?php
$servername = "localhost";
$username = "connexion";
$password = "tttttt";
$dbname = "projetTechWeb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

echo "<b>Test :</b><br>". $login. " ". $mdp. "<br>";

echo "<b>SELECT :</b><br>";

if ($login != "" and $mdp != "") {
	$sql = "SELECT prenom, nom FROM etudiant WHERE login='$login' AND mdp='$mdp';";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
 	 // output data of each row
  		while($row = mysqli_fetch_assoc($result)) {
    			echo "Bonjour " . $row["prenom"]. " ". $row["nom"];
 		 }
	}
}
?>
</body>
</html>

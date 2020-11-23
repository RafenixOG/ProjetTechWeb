<?php
session_start();
?>
<html>
<head><title>Dashboard</title></head>
<body>
<?php
$servername = "localhost";
$username = "connexion";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = test_input($_POST["login"]);
        $mdp = test_input($_POST["mdp"]);
}

function test_input($data) {			//fonction qui permet de "nettoyer"
  $data = trim($data);				//la chaine de caractères entrée
  $data = stripslashes($data);			//pour éviter les injections
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "SELECT * FROM utilisateur WHERE login='$login' AND mdp='$mdp';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
        while($row = mysqli_fetch_assoc($result)) {
                $_SESSION["login"] = $row["login"];
                $_SESSION["prenom"] = $row["prenom"];
                $_SESSION["nom"] = $row["nom"];
		$_SESSION["estProf"] = $row["estProf"]; //je le prend mais je sais pas si j'en aurais besoin
		if ($row["estProf"]) {
			header("location:dashboardProf.php");
		}
		else {
			header("location:dashboard.php");
		}
        }
}
else {
        header("location:index.php?msg=failed");
}
?>
</body>
</html>

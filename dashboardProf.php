<?php
session_start();
?>
<html>
<head><title>Dashboard</title><link rel="stylesheet" href="styles.css"></head>
<body class="prof">
<div class="conteneur">
<?php
$servername = "localhost";
$username = "prof";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sqlExamen = "select intitule from matiere where FK_professeur='". $_SESSION["login"]. "';";
$resultExamen = mysqli_query($conn, $sqlExamen);

echo  "<p><h1>Bonjour ". $_SESSION["prenom"]. "</h1></p><p>Voici votre liste de cours :</p>";
echo "<form method='post' action='listeEleve.php'>";
while ($row = mysqli_fetch_assoc($resultExamen)) {
	echo "<br><input class='boutonProf' type=\"submit\" name=\"bouton\" value=\"". $row["intitule"]. "\">";
}
?>
</form>
</div>
</body>
</html>


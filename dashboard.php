<?php
session_start();
?>
<html>
<head><title>Dashboard</title><link rel="stylesheet" href="styles.css"></head>
<body class="eleve">
<div class="conteneur">
<?php
$servername = "localhost";
$username = "connexion";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

echo  "<p><h1>Bonjour ". $_SESSION["prenom"]. "</h1></p>";
?>
<p>Voici votre liste d'examen :</p>

<?php
$nonPresente = "select matiere.intitule, FK_matiere from examen inner join matiere on examen.FK_matiere = matiere.id where etat='NON PRÉSENTÉ' and FK_etudiant='". $_SESSION["login"]. "';";
$resultNonPresente = mysqli_query($conn, $nonPresente);

$termine = "select matiere.intitule from examen inner join matiere on examen.FK_matiere = matiere.id where etat='TERMINÉ' and FK_etudiant='". $_SESSION["login"]. "';";
$resultTermine = mysqli_query($conn, $termine);

if (mysqli_num_rows($resultNonPresente) == 0 and mysqli_num_rows($resultTermine) == 0) {
	echo "<p>Vous n'avez présenté aucun examen";
}

else {
	echo "<p><h3>Non présentés :</h3></p>";
	if (mysqli_num_rows($resultNonPresente) > 0) {
		echo "<p><form method=\"post\" action=\"examen.php\">";
	        while($row = mysqli_fetch_assoc($resultNonPresente)) {
			echo "<br><input class=\"boutonEleve\" type=\"submit\" name=\"bouton\" value=\"". $row["intitule"]. "\">";
		}
		echo "</form></p>";
	}

	else {
		echo "<p>Vous n'avez aucun examen à présenter";
	}

	echo "<p><h3>Terminés :</h3></p>";
	if (mysqli_num_rows($resultTermine) > 0) {
	        echo "<p><form method=\"post\" action=\"correctifRedirect.php\">";
	        while($row = mysqli_fetch_assoc($resultTermine)) {
	                echo "<br><input class=\"boutonEleve\" type=\"submit\" name=\"bouton\" value=\"". $row["intitule"]. "\">";
	        }
	        echo "</form></p>";
	}

	else {
		echo "<p>Vous n'avez terminé aucun examen</p>";
	}
}
?>
</div>
</body>
</html>

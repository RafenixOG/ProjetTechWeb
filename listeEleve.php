<?php
session_start();
?>
<html>
<head><title>Liste des élèves</title></head>
<body>
<?php
$servername = "localhost";
$username = "prof";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$_SESSION["matiere"] = mysqli_fetch_assoc(mysqli_query($conn, "select id from matiere where intitule='". $_POST["bouton"]. "';"))["id"];

$sqlNonPresente = "select utilisateur.prenom as prenomE, utilisateur.nom as nomE from utilisateur inner join examen on utilisateur.login=examen.FK_etudiant where examen.FK_matiere='". $_SESSION["matiere"]. "' and examen.etat='NON PRÉSENTÉ';";
$resultNonPresente = mysqli_query($conn, $sqlNonPresente);

$sqlEnCours = "select utilisateur.prenom as prenomE, utilisateur.nom as nomE from utilisateur inner join examen on utilisateur.login=examen.FK_etudiant where examen.FK_matiere='". $_SESSION["matiere"]. "' and examen.etat='EN COURS';";
$resultEnCours = mysqli_query($conn, $sqlEnCours);

$sqlTermine = "select utilisateur.prenom as prenomE, utilisateur.nom as nomE from utilisateur inner join examen on utilisateur.login=examen.FK_etudiant where examen.FK_matiere='". $_SESSION["matiere"]. "' and examen.etat='TERMINÉ';";
$resultTermine = mysqli_query($conn, $sqlTermine);

echo "<p><h3>Examen non présenté :</p></h3>";
if (mysqli_num_rows($resultNonPresente) == 0)
	echo "Personne ne doit présenté l'examen";
else {
	while ($row = mysqli_fetch_assoc($resultNonPresente)) {
		echo $row["prenomE"]. " ". $row["nomE"]. "<br>";
	}
}

echo "<p><h3>Examen en cours :</h3></p>";
if (mysqli_num_rows($resultEnCours) == 0)
	echo "Personne n'est en train de  présenté l'examen";
else {
	while ($row = mysqli_fetch_assoc($resultEnCours)) {
		echo $row["prenomE"]. " ". $row["nomE"]. "<br>";
	}
}

echo "<p><h3>Examen terminé :</h3></p>";
if (mysqli_num_rows($resultTermine) == 0)
	echo "Personne n'a présenté l'examen";
else {
	echo "<form method='post' action='correctifRedirectProf.php'>";
	while ($row = mysqli_fetch_assoc($resultTermine)) {
		echo "<input type='submit' name='bouton1' value='". $row["prenomE"]. " ". $row["nomE"]. "'><br>";
	}
	echo "</form>";
}
?>
</body>
</html>

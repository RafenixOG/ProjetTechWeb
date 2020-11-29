<?php
session_start();
$servername = "localhost";
$username = "examen";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<html>
<head><title>Validation</title></head>
<body>
<?php
$correct = 0;
$incorrect = 0;
for ($i = 1; $i <= $_SESSION["nbQuestion"]; $i++) {
	$sql = "select correct from reponse where id=". $_POST["$i"]. ";";
	$result = mysqli_query($conn, $sql);
	if (mysqli_fetch_assoc($result)["correct"])
		$correct++;
	else
		$incorrect++;
}
$note = $correct - 0.5 * $incorrect;
if ($note < 0)
	$note = 0;
else {
	$multiplicateur = 20/$_SESSION["nbQuestion"];
	$note = round($note*$multiplicateur);
}
$sqlNote = "update examen inner join matiere on examen.FK_matiere = matiere.id set examen.etat='TERMINÉ', resultat=". $note. " where matiere.intitule = '". $_SESSION["examen"]. "' and FK_etudiant = '". $_SESSION["login"]. "';";
$resultNote = mysqli_query($conn, $sqlNote);

header("location:correctif.php");
?>
</body>
</html>

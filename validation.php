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
	if ($_POST["$i"] != "" && $_POST["$i"] != "jsp") {
		$sql = "select * from reponse where id=". $_POST["$i"]. ";";
		$result = mysqli_query($conn, $sql);
		if (mysqli_fetch_assoc($result)["correct"])
			$correct++;
		else
			$incorrect++;

		$sqlLigne = "insert into ligne (FK_examen, FK_question, FK_reponse) values (". $_SESSION["examen"]. ", ". $_SESSION["listeQuestion"][$i-1]. ", ". $_POST["$i"]. ");";
		mysqli_query($conn, $sqlLigne);
	}
	else {
		$sqlLigne = "insert into ligne (FK_examen, FK_question) values (". $_SESSION["examen"]. ", ". $_SESSION["listeQuestion"][$i-1]. ");";
                mysqli_query($conn, $sqlLigne);
	}
}
$note = $correct - 0.5 * $incorrect;
if ($note < 0)
	$note = 0;
else {
	$multiplicateur = 20/$_SESSION["nbQuestion"];
	$note = round($note*$multiplicateur);
}
$sqlNote = "update examen set etat='TERMINÉ', resultat=". $note. " where id=". $_SESSION["examen"]. ";";
$resultNote = mysqli_query($conn, $sqlNote);

header("location:correctif.php");
?>
</body>
</html>

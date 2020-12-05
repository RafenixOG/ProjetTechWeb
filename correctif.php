<?php
session_start();
$servername = "localhost";
$username = "examen";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sqlNomExamen = "select matiere.intitule as nom_E from matiere inner join examen on matiere.id=examen.FK_matiere where examen.id='". $_SESSION["examen"]. "';";
$resultNomExamen = mysqli_query($conn, $sqlNomExamen);
$nomExamen = mysqli_fetch_assoc($resultNomExamen)["nom_E"];

$sqlListeQuestion = "select * from ligne where FK_examen=". $_SESSION["examen"]. ";";
$resultListeQuestion = mysqli_query($conn, $sqlListeQuestion);

echo "<html><head><title>Correctif examen de ". $nomExamen. "</title></head><body>";

echo "<h1>Correctif examen de ". $nomExamen. "</h1>";

while($row = mysqli_fetch_assoc($resultListeQuestion)) {
	echo "<p><b>". mysqli_fetch_assoc(mysqli_query($conn, "select intitule from question where id=". $row["FK_question"]. ";"))["intitule"]. "</b>";
	if(is_null($row["FK_reponse"])) {
		echo "<ul><li><span class='incorrect'>Je ne sais pas</span> ❌</li><li><span class='correct'>";
		echo mysqli_fetch_assoc(mysqli_query($conn, "select intitule from reponse where FK_question=". $row["FK_question"]. " and correct=true;"))["intitule"];
		echo " </span> ✅</li></ul>";
	}
	else {
		if (mysqli_fetch_assoc(mysqli_query($conn, "select correct from reponse where id=". $row["FK_reponse"]. ";"))["correct"]) {
			echo "<ul><li><span class='correct'>". mysqli_fetch_assoc(mysqli_query($conn, "select intitule from reponse where id=". $row["FK_reponse"]. ";"))["intitule"];
			echo "</span> ✅</li></ul>";
		}
		else {
			echo "<ul><li><span class='incorrect'>". mysqli_fetch_assoc(mysqli_query($conn, "select intitule from reponse where id=". $row["FK_reponse"]. ";"))["intitule"];
			echo "</span> ❌</li><li><span class='correct'>". mysqli_fetch_assoc(mysqli_query($conn, "select intitule from reponse where FK_question=". $row["FK_question"]. " and correct=true;"))["intitule"];
			echo "</span> ✅</li></ul>";
		}
	}
	echo "</p>";
}
echo "<h2>Note : ". mysqli_fetch_assoc(mysqli_query($conn, "select resultat from examen where id =". $_SESSION["examen"]. ";"))["resultat"]. "/20</h2>";

if ($_SESSION["estProf"])
	$redirect = "dashboardProf.php";
else
	$redirect = "dashboard.php";


echo "<form action='". $redirect. "' method='get'>";
?>
	<input type="submit" value="Retour à l'accueil">
</form>

</body>
</html>

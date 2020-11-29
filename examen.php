<?php
session_start();
$servername = "localhost";
$username = "examen";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$_SESSION["examen"] = $_POST["bouton"];

$sqlEnCours = "update examen inner join matiere on examen.FK_matiere = matiere.id set examen.etat='EN COURS' where matiere.intitule = '". $_SESSION["examen"]. "' and examen.FK_etudiant='". $_SESSION["login"]. "';";
$resultEnCours = mysqli_query($conn, $sqlEnCours);

echo "<html><head><title>Examen de ". $_POST["bouton"]. "</title></head><body>";

echo "<p><h1>Examen de ". $_POST["bouton"]. "</h1></p><p>Répondez aux questions ci-dessous.<br>Votre note sera calculé suivant ";
echo "cette logique :<ul><li>Bonne réponse : +1</li><li>Mauvaise réponse : -0,5</li><li>Aucune réponse : 0</li></ul>Une fois ";
echo "terminer, <b>valider vos réponses à l'aide du bouton <i>VALIDER</i></b></p>";
echo "<p><b>ATTENTION !!!</b> Veillez à ne pas fermer votre navigateur ou quitter cette page avant de terminer et d'appuyer sur le bouton de validation.";
echo "<br>Le non respect de cette consigne entrainera un <b>ZÉRO immédiat à l'examen !</b></p>";

$sqlNbQuestion = "select * from question;";
$resultNbQuestion = mysqli_query($conn, $sqlNbQuestion);
$_SESSION["nbQuestion"] = intdiv(mysqli_num_rows($resultNbQuestion), 2);

$sqlQuestion = "select question.intitule as intitule_Q, question.id as id_Q from question inner join matiere on question.FK_matiere = matiere.id where matiere.intitule = '". $_POST["bouton"]. "' order by rand() limit ". $_SESSION["nbQuestion"]. " ;";
$resultQuestion = mysqli_query($conn, $sqlQuestion);
$i = 1;

echo "<form method='post' action='validation.php'>";
while($row = mysqli_fetch_assoc($resultQuestion)) {
	echo $i. ") ".$row["intitule_Q"]. "<br><br>";
	$sqlReponse = "select * from reponse where FK_question = '". $row["id_Q"]. "' order by rand();";
	$resultReponse = mysqli_query($conn, $sqlReponse);
	while($repRow = mysqli_fetch_assoc($resultReponse)) {
		echo "<input type='radio' id='". $repRow["id"]. "' name='". $i. "' value='". $repRow["id"]. "'>";
		echo "<label for='". $repRow["id"]. "'>". $repRow["intitule"]. "</label><br>";
	}
	echo "<input type='radio' id='jsp' name='". $i. "' value='jsp'>";
        echo "<label for='jsp'>Je ne sais pas</label><br><br>";
	$i++;
}
?>
<input type="submit" name="valider" value="Valider vos réponses">
</form>
</body>
</html>

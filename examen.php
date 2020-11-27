<?php
session_start();
$servername = "localhost";
$username = "examen";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

echo "<html><head><title>Examen de ". $_POST["bouton"]. "</title></head><body>";

echo "<p><h1>Examen de ". $_POST["bouton"]. "</h1></p><p>Répondez aux questions ci-dessous.<br>Votre note sera calculé suivant ";
echo "cette logique :<ul><li>Bonne réponse : +1</li><li>Mauvaise réponse : -0,5</li><li>Aucune réponse : 0</li></ul>Une fois ";
echo "terminer, <b>valider vos réponses à l'aide du bouton <i>VALIDER</i></b></p>";

$sqlNbQuestion = "select * from question;";
$resultNbQuestion = mysqli_query($conn, $sqlNbQuestion);
$nbQuestion = intdiv(mysqli_num_rows($resultNbQuestion), 2);

$sqlQuestion = "select question.intitule as intitule_Q, question.id as id_Q from question inner join matiere on question.FK_matiere = matiere.id where matiere.intitule = '". $_POST["bouton"]. "' order by rand() limit ". $nbQuestion. " ;";
$resultQuestion = mysqli_query($conn, $sqlQuestion);
$i = 1;

echo "<form method='post' action='validation.php'>";
while($row = mysqli_fetch_assoc($resultQuestion)) {
	echo $i. ") ".$row["intitule_Q"]. "<br><br>";
	$sqlReponse = "select * from reponse where FK_question = '". $row["id_Q"]. "';";
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

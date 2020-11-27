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

$sqlQuestion = "select question.intitule from question inner join matiere on question.FK_matiere = matiere.id where matiere.intitule = '". $_POST["bouton"]. "' order by rand() limit ". $nbQuestion. " ;";
$resultQuestion = mysqli_query($conn, $sqlQuestion);

while($row = mysqli_fetch_assoc($resultQuestion)) {
	echo  $row["intitule"]. "<br>";
}


?>
</body>
</html>

<?php
session_start();
$servername = "localhost";
$username = "examen";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "select examen.id as id_E from examen inner join matiere on examen.FK_matiere=matiere.id where matiere.intitule='". $_POST["bouton"]. "' and examen.FK_etudiant='". $_SESSION["login"]. "';";
$result = mysqli_query($conn, $sql);
$_SESSION["examen"] = mysqli_fetch_assoc($result)["id_E"];

header("location:correctif.php");
?>

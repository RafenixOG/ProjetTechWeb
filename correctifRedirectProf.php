<?php
session_start();
$servername = "localhost";
$username = "prof";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$prenomNom = explode(" ", $_POST["bouton1"], 2);
$_SESSION["examen"] = mysqli_fetch_assoc(mysqli_query($conn, "select examen.id as idE from examen inner join utilisateur on examen.FK_etudiant=utilisateur.login where FK_matiere='". $_SESSION["matiere"]. "' and utilisateur.prenom='". $prenomNom[0]. "' and utilisateur.nom='". $prenomNom[1]. "';"))["idE"];

header("location:correctif.php");
?>

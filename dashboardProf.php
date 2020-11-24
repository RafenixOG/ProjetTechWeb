<?php
session_start();
?>
<html>
<head><title>Dashboard Professeur</title></head>
<body>
<?php
$servername = "localhost";
$username = "connexion";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

echo "Bonjour monsieur  ". $_SESSION["nom"];
?>
</body>
</head>

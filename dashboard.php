<?php
session_start();
?>
<html>
<head><title>Dashboard</title></head>
<body>
<?php
$servername = "localhost";
$username = "connexion";
$password = "tttttt";
$dbname = "projetTechWeb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

echo  "Bonjour ". $_SESSION["prenom"];
?>
</body>
</head>

<?php
session_start();
?>
<html>
<head><title>Dashboard</title></head>
<body>
<?php
echo "Bonjour ". $_SESSION["prenom"]. " ". $_SESSION["nom"];
?>
</body>
</head>

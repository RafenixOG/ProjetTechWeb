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
/*
$login = $_POST["login"];
$mdp = $_POST["mdp"];

if ($login != "" and $mdp != "") {
        $sql = "SELECT * FROM etudiant WHERE login='$login' AND mdp='$mdp';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
                while($row = mysqli_fetch_assoc($result)) {
                        $_SESSION["login"] = $row["login"];
                        $_SESSION["prenom"] = $row["prenom"];
                        $_SESSION["nom"] = $row["nom"];
                }
        }
        else {
                echo "Login et/ou mot de passe incorrect";
        }
}*/
echo "Bonjour ". $_SESSION["prenom"];
?>
</body>
</head>
<?php
$host = "mysql";        // Dokploy bruker ofte "mysql" eller "db" som hostname
$user = "root";         // Bytt til ditt brukernavn hvis oppgitt
$pass = "rootpass";     // Sett riktig passord
$db   = "obligatorisk"; // Ditt databasenavn

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Feil ved tilkobling: " . $conn->connect_error);
}
?>

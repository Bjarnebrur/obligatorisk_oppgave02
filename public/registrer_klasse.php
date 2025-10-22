<!DOCTYPE html>
<html>
<head>
    <title>Registrer klasse</title>
</head>
<body>
    <h3>Registrer klasse</h3>

    <form method="post" action="" id="registrer_klasse" name="registrer_klasse"> <!--skjema som samler inn data, id for js, name for php -->
    Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br /> <!-- type - vanlig tekst felt, required gjør at feltet må fylles inn -->
    Klassenavn <input type="klassenavn" id="klassenavn" name="klassenavn" required /> <br />
    Studiumkode <input type="studiumkode" id="studiumkode" name="studiumkode" required /> <br />
    <input type="submit" value="Fortsett" id="fortsett" name="fortsett" /> <!--lager en knapp -->
    <input type="reset" value="Nullstill" name="nullstill" id="nullstill" /> <br />

    </form>
    <p><a href="index.php">Tilbake til hovedmeny</a></p>
</body>
</html>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") { /*sjekker at skejma er sendt inn, nettleser sender data til serveren med POST metoden */ 
    include("db.php"); /* kobler opp mot databasen - db.php*/ 

$klassekode = $_POST['klassekode']; /*henter verdien som blir skrevet i input feltet med name="" i html skjemaet */
$klassenavn = $_POST['klassenavn'];
$studiumkode = $_POST['studiumkode'];

$sql = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) /*sql-spørring til databasen om å legge til ny rad   */
    VALUES ('$klassekode', '$klassenavn', '$studiumkode')";

if ($conn->query($sql)) { /*sql-spørring som sier til databasen at den skal legge inn en ny rad i tabellen */
   echo "<p>Du har registrert klasse <strong>$klassenavn</strong> (klassekode) for studiumkode <strong>$studiumkode<strong>.</p>";
}   else {
    echo "<p> Feil ved registrering:" . $conn->error . "</p>";
}
$conn->close();
}

?>


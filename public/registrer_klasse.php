redigere registrer studie til å passe til klasse 

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$klassekode = $_POST['klassekode'];
$klassenavn = $_POST['klassenavn'];
$studiumkode = $_POST['studiumkode'];

echo "<p>Du har registrert klasse <strong>$klassenavn</strong> (klassekode) for studiumkode <strong>$studiumkode<strong>.</p>";

}
?>


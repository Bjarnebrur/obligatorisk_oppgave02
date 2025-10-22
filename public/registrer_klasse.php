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

if ($_SERVER["REQUEST_METHOD"] == "POST") { /*sjekker at skejma er sendt inn, nettleser sender data til serveren (mysql,tabellen) med POST metoden */ 
    include("db.php"); /* kobler opp mot databasen - db.php*/ 

$klassekode = $_POST['klassekode']; /*henter verdien som blir skrevet i input feltet med name="" i html skjemaet. Dataen du skriver i input blir lagret i variabelen*/
$klassenavn = $_POST['klassenavn'];
$studiumkode = $_POST['studiumkode'];
    
$sqlHentklasse="SELECT * FROM klasse WHERE klassekode='$klassekode';"; /* SELECT * From velger tabell fra mysql databasen, WHERE filtrerer - henter alt som stemmer med innsendt klassekode */
   $sqlResultat=mysqli_query($db,$sqlHentklasse) or die ("ikke mulig &aring; hente data fra databasen"); /* kjører spørringen over - sqlsetning, om det finnes klassekode fra*/
     $antallRader=mysqli_num_rows($sqlResultat); /*lagrer at vi har hentet antall rader, */
     if ($antallRader!=0) {/*sjekker at antall rader ikke er 0, klasse med samme klassekode */
        echo "<p style='color:red;'>Klassen finnes allerede!</p>";
 }  else {
    $sqlInsert = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) /*sql-spørring til databasen om å legge til ny rad, legger inn i database sql, gir verdi til sql variabel */
        VALUES ('$klassekode', '$klassenavn', '$studiumkode')";

         mysqli_query($db,$sqlInsert) or die ("ikke mulig &aring; hente data fra databasen"); /*Kjører spørringen med query, mys_querry gjør at sql spørringen blir lagt til i databasen */
        echo "<p style='color:red;'>Klassen er lagret!</p>";
}
       
}

?>


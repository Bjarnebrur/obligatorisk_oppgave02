<!DOCTYPE html>
<html>
<head>
  <title>Registrer student<title>
</head>
<body>
  <h3>Registrer student</h3>
  <form method="post" action="" id="registrer_student" name="registrer_student">
  brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br /> <!--brukernavn skal endres til at hvis det samme, går ikke -->
  fornavn <input type="text" id="fornavn" name="fornavn" required /> <br />
  etternavn <input type="text" id="etternavn" name="etternavn" required /> <br />
  klassekode <input type="text" id="klassekode" name="klassekode" required /> <br /> <!-- dynamisk listeboks for valg av kl kode -->
  <input type="submit" value="Fortsett" id="fortsett" name="fortsett" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />

  </form>
  <p><a href="index.php">Tilbake til hovedmeny</a></p>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include ("db.php");

$brukernavn = $_POST['brukernavn'];
$fornavn = $_POST['fornavn'];
$etternavn = $_POST['etternavn'];
$klassekode = $_POST['klassekode'];

$sqlHentstudent="SELECT * FROM student WHERE brukernavn='$brukernavn';";
  $sqlResultat=mysqli_query($db, $sqlHentstudent) or die ("ikke mulig &aring; hente data fra databasen");
   $antallRader=mysqli_num_rows($sqlResultat);
  if($antallRader!=0) {
    echo "<p style='color:red;'>Brukernavn finnes allerede!</p>";
  } else {
    $sqlInsert = "INSERT INTO student (brukernavn, fornavn, etternavn, klasskode)
      VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";

      mysqli_query($db, $sqlInsert) or die ("ikke mulig &aring; hente data fra databasen");
      echo "<p style='color:green;'>Student er lagret!</p>";     
  }
    mysqli_close($db);
}
?>
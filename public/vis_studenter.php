<?php  /* vis-alle-poststeder / 
/ Fra team 5 eks 1
/*  Programmet skriver ut alle registrerte poststeder
/
  include("db.php");  / tilkobling til database-serveren utf�rt og valg av database foretatt /

  $sqlSetning="SELECT FROM student;"; /* velger databasen i mysql /

  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
    / SQL-setning sendt til database-serveren /

  $antallRader=mysqli_num_rows($sqlResultat);  / antall rader i resultatet beregnet */
?>

<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="UTF-8">
    <title>Registrerte studenter</title>
</head>
<body>
  <h3>Registerte studenter</h3>

  <table border="1" cellpadding="5">
    <tr>
      <th>Brukernavn</th>
      <th>Fornavn</th>
      <th>Etternavn</th>
      <th>Klassekode</th>
  </tr>

    <?php
    for ($rad = 1; $rad <= $antallRader; $r++) {
      $nåværendeRad = mysqli_fetch_array($sqlResultatet);
      $brukernavn = $rad["brukernavn"];
      $fornavn = $rad["fornavn"];
      $etternavn = $rad["etternavn"];
      $klassekode = $rad["klassekode"];

      echo "<tr>
              <td>$brukeravn</td>
              <td>$fornavn</td>
              <td>$etternavn</td>
              <td>$klassekode</td>
            </tr>";
    }
    ?>
  </table>
</body>
</html>
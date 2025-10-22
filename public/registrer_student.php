<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="UTF-8">
</head>
<body>
  <h3>Register ny student</h3>
    <form method="post" actio=""> <!-- lager et skjema boi-->
        <label>Brukenavn:</label><br>
        <input type="text" name="brukernavn"><br><br>

        <label>Fornavn:</label><br>
        <input type="text" name="fornavn"><br><br>

        <label>Etternavn:</label><br>
        <input type="text" name="etternavn"><br><br>

        <label>Klassekode:</label><br>
        <input type="text" name="klassekode"><br><br>

        <input type="submit" name="submit" value="Registrer student">
    </form>
    <p><a href="index.php">Tilbake til hovedmeny</a></p>
  </table>
</body>
</html>

<?php  
    include ("db.php"); /*kobler opp mot databasen*/
  if ($_SERVER["REQUEST_METHOD"] == "POST") { /* Denne koden sjekker om vi har sendt inn et skjema */ /**/ 
    $brukernavn=$_POST["brukernavn"]; /* det bruker skriver blir lagret her*/
    $fornavn = $_POST["fornavn"]; 
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];
    
    if(!$brukernavn || !$fornavn || !$etternavn || !$klassekode) {/*sjekke at hvert felt er fyllt ut - || betyr eller . - !betyr motsatt / ikke fyllt ut noe*/
        echo"<p style='color:red;'>Alle feltene må fylles ut.</p>";
    } else{
        $sqlSelect = "SELECT * FROM student WHERE brukernavn LIKE '$brukernavn';";
        $sqlResult = mysqli_query($db,$sqlSelect) or die ("Ikke mulig å hente data fra database");
        $antallRader = mysqli_num_rows($sqlResult);
          if($antallRader!=0){
            echo "<p style='color:red;'>Brukernavn finnes allerede!</p>";
          }
            else {
              $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
              VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')"; /*insert into skriver man hvilken kolonne man skal skrive i, value er verdien som blir satt i kolonna ørn*/

               mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere student i databasen.");

              echo "<p style='color:green;'>studenten <strong>$fornavn $etternavn</strong> ble registrert!</p>";
          }

       
   } 
     mysqli_close($db);
}

?>



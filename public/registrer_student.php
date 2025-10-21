<?php  
    include ("db.php"); /*kobler opp mot databasen*/
    /*sjekker om vi har sendt inn ett skjema*/


?>

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

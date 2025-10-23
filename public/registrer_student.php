<!DOCTYPE html>
<html>
<head>
  <title>Registrer student</title>
</head>
<body>
  <h3>Registrer student</h3>

<?php
 include ("db.php"); /*må flyttes før html skjema */
  $sqlKlasser = "SELECT klassekode FROM klasse ORDER BY klassekode";
  $resultatKlasser = mysqli_query($db, $sqlKlasser); /*henter klassekoder fra drop down meny */
?>

  <form method="post" action="" id="registrer_student" name="registrer_student">
  brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br /> <!--brukernavn skal endres til at hvis det samme, går ikke -->
  fornavn <input type="text" id="fornavn" name="fornavn" required /> <br />
  etternavn <input type="text" id="etternavn" name="etternavn" required /> <br />
  klassekode  
  <select id="klassekode" name="klassekode" required>
  <option value="">Velg klasse</option> <!-- legger til dynmisk listeboks -->

<?php
    while($rad = mysqli_fetch_assoc($resultat)){
     echo "<option value='".$rad['klassekode']."'>".$rad['klassekode']."</option>";
  }
?>
 </select> <!-- må komme rett etter drop down menyen -->
 <br />
  <input type="submit" value="Fortsett" id="fortsett" name="fortsett" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

  <p><a href="index.php">Tilbake til hovedmeny</a></p>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

 

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
    $sqlInsert = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
      VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";

      mysqli_query($db, $sqlInsert) or die ("ikke mulig &aring; hente data fra databasen");
      echo "<p style='color:green;'>Student er lagret!</p>";     
  }
    mysqli_close($db);
   
}
?>
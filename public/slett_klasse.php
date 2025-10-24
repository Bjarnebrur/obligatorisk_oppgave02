<h3>Slett klasse</h3> <!-- Student må slettes før man kan slette klassekode, om noen studenter er påmeldt klassen -->

<form method="post" action="" id="slettklasseskjema" name="slettklasseskjema" onSubmit="return bekreft()">
  Klasskode 
  <select id="klassekode" name="klassekode" required>
    <option value ="">Velg klasse...</option>
      <?php
        include ("db.php"); /*Åpnes 1 gang her for ¨å fylle listeboksen, og 1 gang til i POST_håndtering når skjema sendes inn */
        $sqlSetning = "SELECT klassekode FROM klasse ORDER BY klassekode";
        $resultat = mysqli_query($db, $sqlSetning);

        while ($rad = mysqli_fetch_assoc($resultat))
        {
          echo "<option value?'" . htmlspecialchars($rad['klassekode']) . "'>" . 
            htmlspecialchars($rad['klassekode']) . "</option>";
        }
      mysqli_close($db);
      ?>
     </select>
    <br/>
    <input type="submit" value="Slett klassekode" name="slettklasseknapp" id="slettklasseknapp" />
</form>

<?php
  if (isset($_POST ["slettklasseknapp"]))
    {	
      $klassekode=$_POST ["klassekode"];
	  
	  if (!$klassekode)
        {
          print ("klassekode mangler");
        }
      else
        {
          include("db.php");  
          /*sjekker at klassen eksisterer */
          $sqlSetning="SELECT * FROM klasse WHERE klassekode=?"; 
          $stmt = mysqli_prepare($db, $sqlSetning);
          mysqli_stmt_bind_param($stmt, "s", $klassekode);
          mysqli_stmt_execute($stmt);
          $sqlResultat = mysqli_stmt_get_result($stmt);
          $antallRader = mysqli_num_rows($sqlResultat);

          if ($antallRader==0) 
            {
              print ("klassen finnes ikke");
            }
          else
            {	  
              /*sjekker om det eksisterer studenter i klassen */
              $sqlSetning = "SELECT COUNT(*) as antall FROM student WHERE klassekode=?";
              $stmt = mysqli_prepare($db, $sqlSetning);
              mysqli_stmt_bind_param($stmt, "s", $klassekode);
              mysqli_stmt_execute($stmt);
              $resultat = mysqli_stmt_get_result($stmt);
              $rad = mysqli_fetch_assoc($resultat);

              if ($rad['antall'] > 0)
                {
                  print("Kani ikke slette klassen. Det er " . $rad['antall'] . "student(er)) p&aring;meldt denne klassen.<br/>");
                  print("Du m&aring; f&oslash;rst slette eller flytte studentene.");
              }
              else
              {
                /*Trygt å slette klassen */
                $sqlSetning ="DELETE FROM klasse WHERE klassekode=?";
                $stmt = mysqli_prepare($db, $sqlSetning);
                mysqli_stmt_bind_param($stmt, "s", $klassekode);
                mysqli_stmt_execute($stmt);

                print("F&oslash;lgende klasse er n&aring; slettet: $klassekode<br />");

              }
           
            }
            mysqli_close($db);
        }
    }
?> 

<p><a href="index.php">Tilbake til hovedmeny</a></p>
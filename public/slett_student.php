<!DOCTYPE html>
<html>
    <head>
        <title>Slett student</title>
        <script>
            function bekreft(){
                return confirm("Er du sikker på at du vil slette denne studenten?")
            }
        </script>
    </head>
<body>

<h3>Slett student</h3>

<form method="post" action="" id="slettstudentskjema" name="slettstudentskjema" onSubmit="return bekreft()">
brukernavn
    <select id="brukernavn" name="brukernavn" required>
        <option value="">Velg brukernavn...</option>
            <?php
                include ("db.php");
                $sqlSetning ="SELECT brukernavn FROM student ORDER BY brukernavn";
                $resultat =mysqli_query($db, $sqlSetning);

                while ($rad = mysqli_fetch_assoc($resultat))
                {
                    echo "<option value='" . htmlspecialchars($rad['brukernavn']) . "'>" . 
                        htmlspecialchars($rad['brukernavn']) . "</option>";                   
                }
            mysqli_close($db);
            ?>
            </select>
        <br/>
        <input type="submit" value="Slett brukernavn" name="slettbrukernavnknapp" id="slettbrukernavnknapp" />
</form>

<?php
    if (isset($_POST ["slettbrukernavnknapp"]))
    {
        $brukernavn=$_POST ["brukernavn"];
        
        if (!$brukernavn)
        {
            print ("brukernavn mangler");
        }
     else 
        {
            include("db.php");

            /*sjekk at student finnes */
            $sqlSetning = "SELECT * FROM student WHERE brukernavn=?";
            $stmt = mysqli_prepare($db, $sqlSetning);
            mysqli_stmt_bind_param($stmt, "s", $brukernavn);
            mysqli_stmt_execute($stmt);
            $sqlResultat = mysqli_stmt_get_result($stmt);
            $antallRader = mysqli_num_rows($sqlResultat);

            if ($antallRader == 0)
            {
                print("studenten finnes ikke");
            }
            else
            {   /*slett studenten */
                $sqlSetning= "DELETE FROM student WHERE brukernavn=?";
                $stmt = mysqli_prepare($db, $sqlSetning);
                mysqli_stmt_bind_param($stmt, "s", $brukernavn);
                mysqli_stmt_execute($stmt);

                print ("Følgende bruker er slettet: $brukernavn<br />");

            mysqli_close($db);
            }
        }
     }
?>

<p><a href="index.php">Tilbake til hovedmeny</a></p>

  </body>
</html>


<h3>Slett klasse</h3>

<form method="post" action="" id="slettklasseskjema" name="slettklasseskjema" onSubmit="return bekreft()">
  Klasskode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  <input type="submit" value="Slett klassekode" name="slettklasseknapp" id="slettklasseKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettklasseknapp"]))
    {	
      $klassekode=$_POST ["klassekode"];
	  
	  if (!$klassekode)
        {
          print ("klassekode m&aring; mangler");
        }
      else
        {
          include("db.php");  

          $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0) 
            {
              print ("klassen finnes ikke");
            }
          else
            {	  
              $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
             
		
              print ("F&oslash;lgende klasse er n&aring; slettet: $klassekode  <br />");
            }
            mysqli_close($db);
        }
    }
?> 
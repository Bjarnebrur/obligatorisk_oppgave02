redigere registrer studie til å passe til klasse 

<!DOCTYPE html>
<html>
<head>
	<title>Eksempel 2</title>
</head>
<body>
	<h3>Eksempel 2 </h3>
    
    <form method="post" action="tema04/eksempler/eksempel-2.php" id="eksempel2" name="eksempel2">
        Fornavn <input type="text" id="fornavn" name="fornavn" required /> <br />
        Etternavn <input type="text" id="etternavn" name="etternavn" required /> <br />
		<input type="submit" value="Fortsett" id="fortsett" name="fortsett" />
		<input type="reset" value="Nullstill" name="nullstill" id="nullstill" /> <br />
	</form>
</body>
</html>

<?php  /*  Eksempel 2 */
/*
/*    Programmet mottar fra et HTML-skjema et fornavn og et etternavn ved POST-metoden
/*    Programmet lager et fullt navn ved å inkludere en egendefinert fuksjon 
*/

  include("funksjoner.php");  /* funksjoner inkludert */

  $fornavn=$_POST ["fornavn"];
  $etternavn=$_POST ["etternavn"];  

  $navn=fulltNavn($fornavn,$etternavn);

  print ("Navnet er $navn");  

?>
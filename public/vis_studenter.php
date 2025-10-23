<!DOCTYPE html>
<html>
<head>
  <title>Registrerte studenter</title>
</head>
<body>

<?php  

  include("db.php"); 

  $sqlSetning="SELECT * FROM student;";
  
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
  
	
  $antallRader=mysqli_num_rows($sqlResultat);  
  print ("<h3>Registrerte studenter</h3>");
  print ("<table border=1>");  
  print ("<tr><th align=left>brukernavn</th> <th align=left>fornavn</th> <th align=left>etternavn</th> <th align=left>klassekode</th></tr>"); /*tr= table row, th=table height */
 
  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);
      $brukernavn=$rad["brukernavn"];       
      $fornavn=$rad["fornavn"];    
      $etternavn=$rad["etternavn"]; 
      $klassekode=$_post["klassekode"];

      print ("<tr> <td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td> </tr>"); /*forløkke, ittererererer igjennom hver rad og printer ut til slutt */
    }
  print ("</table>"); 
?>

<p><a href="index.php">Tilbake til hovedmeny</a></p>

</body>
</html>
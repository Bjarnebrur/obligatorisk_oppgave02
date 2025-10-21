<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="no">
<head><meta charset="UTF-8"><title>Registrer klasse</title></head>
<body>
<h3>Registrer ny klasse</h3>
<form method="post">
  Klassekode: <input type="text" name="klassekode"><br>
  Klassenavn: <input type="text" name="klassenavn"><br>
  Studiumkode: <input type="text" name="studiumkode"><br>
  <input type="submit" value="Lagre">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kode = $_POST['klassekode'];
  $navn = $_POST['klassenavn'];
  $studium = $_POST['studiumkode'];

  $sql = "INSERT INTO klasse VALUES ('$kode', '$navn', '$studium')";
  if ($conn->query($sql)) {
    echo "<p>Klasse lagret!</p>";
  } else {
    echo "<p>Feil: " . $conn->error . "</p>";
  }
}
?>
</body>
</html>
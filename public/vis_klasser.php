<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="no">
<head><meta charset="UTF-8"><title>Vis klasser</title></head>
<body>
<h3>Alle klasser</h3>

<table border="1">
<tr><th>Kode</th><th>Navn</th><th>Studium</th></tr>

<?php
$result = $conn->query("SELECT * FROM klasse");
while($row = $result->fetch_assoc()) {
  echo "<tr><td>{$row['klassekode']}</td><td>{$row['klassenavn']}</td><td>{$row['studiumkode']}</td></tr>";
}
?>
</table>
</body>
</html>

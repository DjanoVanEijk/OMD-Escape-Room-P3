<!-- Op deze pagina zie je een overzicht van alle reviews in een tabel.
-->

 <?php
require_once('../dbcon.php');

try {
  $stmt = $db_connection->query("SELECT * FROM overzicht");
  $overzicht = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Databasefout: " . $e->getMessage());
}

foreach ($overzicht as $review) {
  echo htmlspecialchars($review['Team']) . "<br>";
  echo htmlspecialchars($review['Player']) . "<br>";
  echo htmlspecialchars($review['Score']) . "<br>";
  echo htmlspecialchars($review['Rating']) . "<br>";
  echo htmlspecialchars($review['Review']) . "<br>""<br>";
}
?>
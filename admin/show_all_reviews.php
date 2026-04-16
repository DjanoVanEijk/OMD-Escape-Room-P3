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
  echo htmlspecialchars($review['team']) . "<br>";
  echo htmlspecialchars($review['player']) . "<br>";
  echo htmlspecialchars($review['score']) . "<br>";
  echo htmlspecialchars($review['rating']) . "<br>";
  echo htmlspecialchars($review['review']) . "<br>";
}
?>
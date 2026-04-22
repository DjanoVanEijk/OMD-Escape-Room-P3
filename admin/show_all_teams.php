<!-- Op deze pagina zie je een overzicht van alle teams in een tabel.
     Bij elk team staan de teamnaam de teamleden en de score.
-->

<?php
require_once('../dbcon.php');

try {
  $stmt = $db_connection->query("SELECT * FROM overzicht");
  $overzicht = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Databasefout: " . $e->getMessage());
}

foreach ($overzicht as $team) {
  echo htmlspecialchars($team['team']) . "<br>";
  echo htmlspecialchars($team['player']) . "<br>";
  echo htmlspecialchars($team['score']) . "<br>";
}
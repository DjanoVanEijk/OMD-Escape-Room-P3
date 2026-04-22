

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
  echo htmlspecialchars($team['players']) . "<br>";
  echo htmlspecialchars($team['tijd']) . "<br>";
}
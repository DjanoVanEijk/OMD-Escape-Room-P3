<!-- Op deze pagina zie je alle raadsels in een tabel.
     Je ziet per raadsel: de raadsel, het antwoord, de hint en bij welke room die hoort (roomID).
 -->

 <?php
require_once('../dbcon.php');

try {
  $stmt = $db_connection->query("SELECT * FROM riddles");
  $riddles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Databasefout: " . $e->getMessage());
}

foreach ($riddles as $riddle) {
  echo htmlspecialchars($riddle['riddle']) . "<br>";
  echo htmlspecialchars($riddle['answer']) . "<br>";
  echo htmlspecialchars($riddle['hint']) . "<br>";
  echo htmlspecialchars($riddle['roomId']) . "<br><br>";
}
?>
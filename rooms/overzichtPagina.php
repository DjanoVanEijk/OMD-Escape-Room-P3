<?php
require_once('../dbcon.php');

try {
    $stmt = $db_connection->query("SELECT * FROM overzicht");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Databasefout: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Pagina</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/app.js" defer></script>
</head>
<body class="overpage">
  <div class="logo">
    <img src="../img/footagecrate-4k-rectangular-stamp-guilty@2X.webp" alt="">
  </div>
    <h1 class="overh1">Overzicht</h1>
    <table width="100%">
      <tr>
        <th class="border1">Team</th>
        <th class="border2">Player</th>
        <th class="border2">Score</th>
        <th class="border2">Rating</th>
        <th class="border3">Review</th>
      </tr>
      <?php if (!empty($results)): ?>
        <?php foreach ($results as $row): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['Team']); ?></td>
            <td><?php echo htmlspecialchars($row['Player']); ?></td>
            <td><?php echo htmlspecialchars($row['Score']); ?></td>
            <td><?php echo htmlspecialchars($row['Rating']); ?></td>
            <td><?php echo htmlspecialchars($row['Review']); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5">Geen resultaten gevonden.</td>
        </tr>
      <?php endif; ?>
    </table>
    <a href="../index.php" class="overbtn"><button>Terug naar startpagina</button></a>
</body>
</html>


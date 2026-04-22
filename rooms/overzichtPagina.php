<?php
require_once('../dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = $_POST['rating'] ?? '';
    $descriptions = $_POST['descriptions'] ?? '';

    if (empty($rating) || empty($descriptions)) {
        echo "Vul alle velden in!";
    } else {
        try {
            $stmt = $db_connection->prepare("INSERT INTO overzicht (rating, review) VALUES (:rating, :review)");
            $stmt->execute([
                ':rating' => $rating,
                ':review' => $descriptions
            ]);
        } catch (PDOException $e) {
            die("Databasefout: " . $e->getMessage());
        }
    }
}

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
        <th class="border3">Review met feedback en moeilijkheid</th>
      </tr>
      <?php if (!empty($results)): ?>
        <?php foreach ($results as $row): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['team']); ?></td>
            <td><?php echo htmlspecialchars($row['player']); ?></td>
            <td><?php echo htmlspecialchars($row['time']); ?></td>
            <td><?php echo htmlspecialchars($row['rating']); ?></td>
            <td><?php echo htmlspecialchars($row['review']); ?></td>
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


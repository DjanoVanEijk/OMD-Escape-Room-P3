<?php
require_once('../dbcon.php');

try {
  $stmt = $db_connection->query("SELECT * FROM riddles WHERE roomId = 1");
  $riddles = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <th class="border1">Player</th>
        <th class="border2">Rating</th>
        <th class="border3">Review</th>
      </tr>
      <tr>
        <td></td>
        <td>
          <?php $rating = $_POST['rating'] ?? '';
          if (isset($_POST['rating'])) {
            echo "$rating";
          };
          ?>
        </td>
        <td>
          <?php $description = $_POST['description'] ?? '';
          if (isset($_POST['description'])) {
            echo "$description";
          };
          ?>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
    <a href="../index.php" class="overbtn"><button>Terug naar startpagina</button></a>
</body>
</html>


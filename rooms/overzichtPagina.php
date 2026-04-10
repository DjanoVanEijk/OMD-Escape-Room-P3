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
<body>
    <h1>Overzicht Pagina</h1>
    <table width="100%" border="5px">
      <tr>
        <th>Player</th>
        <th>Rating</th>
        <th>Review</th>
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
    <a href="../index.php"><button>Terug naar startpagina</button></a>
</body>
</html>


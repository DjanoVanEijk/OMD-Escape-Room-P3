<!-- Op deze pagina kan je een raadsel toevoegen.
     De admin vult een raadsel, antwoord, hint en bijbehorend room ID in.
     Deze gegevens worden opgeslagen in de database. -->

<?php
require_once('../dbcon.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $riddle = $_POST['riddle'];
    $answer = $_POST['answer'];
    $hint = $_POST['hint'];
    $roomId = $_POST['roomId'];

    try {
        $stmt = $db_connection->prepare("INSERT INTO riddles (riddle, answer, hint, roomId) VALUES (:riddle, :answer, :hint, :roomId)");
        $stmt->bindParam(':riddle', $riddle);
        $stmt->bindParam(':answer', $answer);
        $stmt->bindParam(':hint', $hint);
        $stmt->bindParam(':roomId', $roomId);
        $stmt->execute();
        echo "Raadsel succesvol toegevoegd!";
    } catch (PDOException $e) {
        die("Databasefout: " . $e->getMessage());
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <h1>Raadsel toevoegen</h1>
     <form method="POST" action="">
          <label for="riddle">Raadsel:</label><br>
          <input type="text" id="riddle" name="riddle" required><br><br>

          <label for="answer">Antwoord:</label><br>
          <input type="text" id="answer" name="answer" required><br><br>

          <label for="hint">Hint:</label><br>
          <input type="text" id="hint" name="hint"><br><br>

          <label for="roomId">Room ID:</label><br>
          <input type="number" id="roomId" name="roomId" required><br><br>

          <input type="submit" value="Raadsel toevoegen">
     </form>
</body>
</html>
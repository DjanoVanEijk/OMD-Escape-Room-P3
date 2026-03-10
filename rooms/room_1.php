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
  <title>Escape Room 1</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <h1>Team: ...</h1>
  <h1 id="timers">5:00</h1>

<div id="overlay">
<img src="../img/10688.png" alt="Game Over">
<p>De tijd is om! Je bent er niet in geslaagd te ontsnappen</p>
</div>


  <div class="container">
    <div class="flex1">
    <?php foreach ($riddles as $index => $riddle) : ?>
    <div class="box box<?php echo $index + 1; ?>" onclick="openModal(<?php echo $index; ?>)"
      data-index="<?php echo $index; ?>" data-riddle="<?php echo htmlspecialchars($riddle['riddle']); ?>"
      data-answer="<?php echo htmlspecialchars($riddle['answer']); ?>">
      Vraag <?php echo $index + 1; ?>

    </div>
    <?php endforeach; ?>
  </div>
  <br>
  <p>
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
    Sit dicta incidunt, optio ipsa hic numquam vitae quisquam 
    magni cum repellendus veritatis nesciunt? Ea maxime pariatur 
    maiores doloribus officiis, consectetur cum.
  </p>
    </div>

  <section class="overlay" id="overlay" onclick="closeModal()"></section>

  <section class="modal" id="modal">
    <h2>Escape Room Vraag</h2>
    <p id="riddle"></p>
    <input type="text" id="answer" placeholder="Typ je antwoord">
    <button onclick="checkAnswer()">Verzenden</button>
    <p id="feedback"></p>
  </section>

  <script src="../js/app.js"></script>

</body>

</html>
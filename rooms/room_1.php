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

<body class="cell">
  <div class="flex2">
    <h1 class="info" id="timers">5:00</h1> 
    <h1 class=info>
      <?php $teamnaam = $_POST['teamname'] ?? '';
        if (isset($_POST['teamname'])) {
        echo "Team: $teamnaam";
        }; 
      ?>
    </h1> 
    <h1 class="info">?</h1>
</div>
  

  
  <div id="overlayverlies">
    <div class="organiseverlies">
      <img class="verliesimg" src="../img/verliesimg.jpg" alt="Game Over">
      <p class="verliesp">De tijd is om! Je bent er niet in geslaagd te ontsnappen</p>
    </div>
  </div>

  <div>
    <?php foreach ($riddles as $index => $riddle) : ?>
    <div class="box room1box<?php echo $index + 1; ?>" onclick="openModal(<?php echo $index; ?>)"
      data-index="<?php echo $index; ?>" data-riddle="<?php echo htmlspecialchars($riddle['riddle']); ?>"
      data-answer="<?php echo htmlspecialchars($riddle['answer']); ?>">
      Box <?php echo $index + 1; ?>
    </div>
    <?php endforeach; ?>
  </div>


  <section id="overlay" onclick="closeModal()"></section>

  <section class="modal" id="modal">
    <h2>Escape Room Vraag</h2>
    <p id="riddle"></p>
    <input type="text" id="answer" placeholder="Typ je antwoord">
    <button onclick="checkAnswer()">Verzenden</button>
    <p id="feedback"></p>
  </section>

  <section id="nextpage" onclick="closeModal()"></section>

  <section id="endroom">
    <h2>Goed gedaan!</h2>
    <p>Je mag naar het volgende kamer!</p>
    <a href="room_2.php"><button>Gaan</button></a>
  </section>

  <script src="../js/app.js"></script>

</body>

</html>
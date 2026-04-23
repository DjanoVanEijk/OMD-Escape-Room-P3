<?php
  session_start();  
  
  $server = "localhost"; 
  $username = "root";
  $password = "";  
  $db = "escape-room";

  $_SESSION['teamname'] = $_POST['teamname'] ?? '';

  try {
    $db_connection = new PDO("mysql:host=$server; dbname=$db", $username, $password);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "Verbinding mislukt" . $e->getMessage();
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (
    !empty($_POST['teamname']) &&
    !empty($_POST['name1']) &&
    !empty($_POST['name2']) &&
    !empty($_POST['name3'])
  ) {
    $team = $_POST['teamname'];
    $all_players = $_POST['name1'] . ", " . $_POST['name2'] . ", " . $_POST['name3'];
    $time = $_POST['time'] ?? 0;

    $sql = "UPDATE team 
            SET team = :team, players = :players";

    $stmt = $db_connection->prepare($sql);
    $stmt->execute([
      ':team' => $team,
      ':players' => $all_players,
    ]);

    header("Location: rooms/room_1.php");
    exit();

  } else {
    echo "Vul alle velden in!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escape Room</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/app.js" defer></script> 
</head>
<body class="home">
  <header></header>
  <img src="img/footagecrate-4k-rectangular-stamp-guilty@2X.webp" alt="">
  <h1>Welkom</h1>
  <p>Jarenlang heb je gewacht op dit moment</p>
  <p>De bewakers denken dat alles onder controle is, Maar jij hebt een plan</p>
  <p>Gebruik alles wat je kunt vinden, werk samen en blijf stil</p>
  <p>Dit is je kans!</p>
  <button onclick="openForm()">Register</button>
  
  <section id="overform" onclick="closeModal()">

    <section class="formmodal" id="formmodal">
      <form method="post">
        <div class="teamname1">
          <h2>Teamnaam:</h2>
          <input type="text" id="teamname" name="teamname" required>
        </div>
        <div class="player1">
          <h2>Speler 1:</h2>
          <input type="text" id="name1" name="name1" required>
        </div>
        <div class="player2">
          <h2>Speler 2:</h2>
          <input type="text" id="name2" name="name2" required>
        </div>
        <div class="player3">
          <h2>Speler 3:</h2>
          <input type="text" id="name3" name="name3" required>
        </div>
        <input type="submit" value="Play" id="subform">
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['teamname']) || empty($_POST['name1']) || empty($_POST['name2']) || empty($_POST['name3'])) {
        echo "Vul alle velden in!";
        }}
        ?>
      </form>
    </section>

  </section>

</body>

</html>
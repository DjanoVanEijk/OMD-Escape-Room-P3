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
      <form action="rooms/room_1.php" method="post">
        <h2>Teamnaam:</h2>
        <input type="text" id="teamname" naam="teamname"  required>
        <h2>Speler 1:</h2>
        <input type="text" id="name1" name="name1" required>
        <h2>Speler 2:</h2>
        <input type="text" id="name2" name="name2" required>
        <h2>Speler 3:</h2>
        <input type="text" id="name3" name="name3" required>
        <input class="subform" type="submit" value="Play" >
        <?php 
          $teamnaam = $_POST['teamname'] ?? '';
          if (isset($_POST['teamname'])) {
          echo "Vul het eerst in!";    
          };
          if (isset($_POST['name1']) && isset($_POST['name2']) && isset($_POST['name3'])) {
            echo "Vul het eerst in!";
          }
        ?>
      </form>
    </section>

  </section>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escape Room</title>
<link rel="stylesheet" href="css/style.css">
  
</head>
<body class="home">
  <header></header>
  <img src="img/footagecrate-4k-rectangular-stamp-guilty@2X.webp" alt="">
  <h1>Welkom</h1>
  <p>Jarenlang heb je gewacht op dit moment</p>
  <p>De bewakers denken dat alles onder controle is, Maar jij hebt een plan</p>
  <p>Gebruik alles wat je kunt vinden, werk samen en blijf stil</p>
  <p>Dit is je kans!</p>
<<<<<<< Updated upstream
  <button><a href="./rooms/room_1.php">Room 1</a></button>
=======
  <button onclick="openModal_1()">Register</button>
>>>>>>> Stashed changes
  
  <section id="overlay1" onclick="closeModal()"></section>

  <section class="modal1" id="modal1">
    <h2>Teamnaam:</h2>
    <p id="registration"></p>
    <input type="text" id="teamname" placeholder="Typ je teamnaam">
    <button onclick="submitRegistration()">Play</button>
    <p id="feedback"></p>
  </section>

</body>

</html>
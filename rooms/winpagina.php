<?php
    $server = "localhost"; 
    $username = "root";
    $password = "";  //macbook gebruikers vullen bij wachtwoord "root" in.
    $db = "escape-room"; //pas dit aan indien de naam van jullie database anders is

    try {
        $db_connection = new PDO("mysql:host=$server; dbname=$db", $username, $password);
        $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Verbinding mislukt" . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winpagina</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/app.js" defer></script>
</head>
<body class="winpagina">
    <h1>Je hebt gewonnen!!</h1>
    <div>  
        <div class="windiv">
            <img class="winimg" src="../img/winimg.webp" alt="afbeelding">
            <div class="tekstdeel">
                <h2 class="winp">Na een gevaarlijke reis <br>
                bent je er eindelijk in geslaagd te ontsnappen.</h2>
                <form action="overzichtPagina.php" method="post" class="formreview">
                    <h2 class="review">Review</h2>
                    <input type="number" name="rating" id="rating" placeholder="star rating" max=5 min=0>
                    <textarea type="text" name="description" id="description" placeholder="description"></textarea>
                    <input type="submit" value="Submit" id="reviewsub">
                    <?php 
                        $rating = $_POST['rating'] ?? '';
                        if (isset($_POST['rating'])) {
                            echo "Vul het eerst in!";    
                        };
                        $description = $_POST['description'] ?? '';
                        if (isset($_POST['description'])) {
                            echo "Vul het eerst in!";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>
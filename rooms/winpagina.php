<?php
require_once('../dbcon.php');

try {
    $stmt = $db_connection->query("SELECT * FROM overzicht");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Databasefout: " . $e->getMessage());
};

//$sql = "INSERT INTO overzicht (rating, review)
    //VALUES (rating, descriptions)"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Winpagina</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="winpagina">
    <h1>Je hebt gewonnen!</h1>
    <div class="winflex">
        <div class="wincontainer">
            <img class="winimg" src="../img/winimg.png" alt="afbeelding">
            <h2 class="winp">Na een gevaarlijke reis bent je er eindelijk in geslaagd te ontsnappen.</h2>
        </div>

        <form action="overzichtPagina.php" method="post" class="formreview">
            <h2 class="review">Review</h2>
            <input type="number" name="rating" value="rating" id="rating" placeholder="star rating" max="5" min="0">
            <textarea name="descriptions" value="descriptions" id="descriptions" placeholder="Review met feedback en moeilijkheid"></textarea>
            <input type="submit" value="Submit" id="reviewsub">
            <?php 
                $rating = $_POST['rating'] ?? '';
                if (isset($_POST['rating'])) {
                    echo "Vul het eerst in!";    
                };
                $descriptions = $_POST['descriptions'] ?? '';
                if (isset($_POST['descriptions'])) {
                    echo "Vul het eerst in!";    
                };
                $stmt = $db_connection->prepare("INSERT INTO overzicht (rating, review) VALUES (:rating, :descriptons)");
                $stmt->execute([
                    ':rating' => $rating,
                    ':review' => $review
                ]);
            ?>
        </form>3
    </div>
</body>
</html>
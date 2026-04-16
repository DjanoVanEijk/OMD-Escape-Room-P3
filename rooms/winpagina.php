
<?php
session_start();
// Geen database connectie hier nodig!
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

        <form action="../admin/add_review.php" method="post" class="formreview">
            <h2 class="review">Review</h2>
            <input type="number" name="rating" id="rating" placeholder="star rating" max="5" min="0">
            <textarea name="description" id="description" placeholder="Review met feedback en moeilijkheid"></textarea>
            <input type="submit" value="Submit" id="reviewsub">
        </form>
    </div>
</body>
</html>
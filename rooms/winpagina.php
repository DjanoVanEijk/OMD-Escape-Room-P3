<?php
session_start();

$end_time = time();
$start_time = $_SESSION['start_time'] ?? $end_time;

$duration = $end_time - $start_time;

require_once('../dbcon.php');

$stmtTeam = $db_connection->query("SELECT team, players FROM team");
$teamData = $stmtTeam->fetch(PDO::FETCH_ASSOC);

//$sql = "INSERT INTO overzicht (rating, review)
    //VALUES (rating, review)"; 

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
            <input type="hidden" name="team" value="<?php echo htmlspecialchars($teamData['team'] ?? ''); ?>">
            <input type="hidden" name="players" value="<?php echo htmlspecialchars($teamData['players'] ?? ''); ?>">
             <input type="hidden" name="time" value="<?php echo htmlspecialchars($duration ?? ''); ?>">
            <h2 class="review">Review</h2>
            <input type="number" name="rating" value="rating" id="rating" placeholder="star rating" max="5" min="0">
            <textarea name="review" value="review" id="review" placeholder="Review"></textarea>
            <input type="submit" value="Submit" id="reviewsub">
            <?php 
                $rating = $_POST['rating'] ?? '';
                if (isset($_POST['rating'])) {
                    echo "Vul het eerst in!";    
                };
                $review = $_POST['review'] ?? '';
                if (isset($_POST['review'])) {
                    echo "Vul het eerst in!";    
                };

                $team = $_POST['team'] ?? '';
                if (isset($_POST['team'])) {
                    echo "Maak een team aan!";    
                };
                $players = $_POST['players'] ?? '';
                if (isset($_POST['players'])) {
                    echo "Maak een team aan!";    
                };
                $stmt = $db_connection->prepare("INSERT INTO overzicht (rating, review, team, players, time) VALUES (:rating, :review, :team, :players, :time)");
                $stmt->execute([
                    ':rating' => $rating,
                    ':review' => $review,
                    ':team' => $team,
                    ':players' => $players,
                    ':time' => $duration
                ]);
            ?>
        </form>
    </div>
</body>
</html>
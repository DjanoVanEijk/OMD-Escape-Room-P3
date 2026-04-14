<!-- Op deze pagina kan je een review toevoegen.
     Een speler vult het formulier in met een rating, moeilijkheid en ruimte voor feedback.
     Deze gegevens worden opgeslagen in de database. -->
<?php
session_start();
require_once('../dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['current_team_id'])) {
    $rating = $_POST['rating'] ?? 0;
    $review = $_POST['description'] ?? 'Geen review';
    $team_id = $_SESSION['current_team_id'];

    $sql = "UPDATE overzicht SET Rating = :Rating, Review = :Review WHERE id = :id";
    $stmt = $db_connection->prepare($sql);
    
    $result = $stmt->execute([
        ':Rating' => $rating,
        ':Review' => $review,
        ':id'     => $team_id
    ]);

    // Als de update is gelukt, halen we het ID uit de sessie (optioneel)
    if($result) {
        unset($_SESSION['current_team_id']); 
    }
}

header("Location: ../rooms/overzichtPagina.php");
exit();
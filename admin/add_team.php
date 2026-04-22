<!-- Op deze pagina maak je een team aan.
     Voeg een veld toe voor de teamnaam en minstens twee velden voor de namen van de teamleden. -->

 <?php
  session_start();
  require_once('../dbcon.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. De gegevens uit het formulier ophalen
    $team = $_POST['teamname'];
    $all_players = $_POST['name1'] . ", " . $_POST['name2'] . ", " . $_POST['name3'];
    $time = $_POST['time']?? 0;
    $rating = $_POST['rating']?? 0;
    $review = $_POST['review']?? 'Geen review';

    // 2. De SQL query voorbereiden (veilig tegen SQL-injectie)
    $sql = "INSERT INTO overzicht (team, players, time) 
            VALUES (:team, :players, :time)";
    
    $stmt = $db_connection->prepare($sql);
    
    // 3. De gegevens daadwerkelijk versturen
    $stmt->execute([
    ':team'   => $team,
    ':players' => $all_players,
    ':time'  => $time,
]);


$_SESSION['current_team_id'] = $db_connection->lastInsertId();


header("Location: ../rooms/overzichtPagina.php");
exit();
}
?>
<?php

include "math.php";

session_start();
if (!isset($_SESSION['times'])) {
    $_SESSION['times'] = array();
}
$players = array("Cean", "Arnold", "Jesus", "Eric");
shuffle($players);

function playHand(&$deck) {
    $total = 0;
    $suit = array("clubs", "hearts", "diamonds", "spades");
    echo "<div class='playerHand'>";
    while ($total < 42) {
        if ($total > 38) break;
        $card = array_pop($deck);
        $suitName = $suit[floor($card / 13)];
        $cardValue = $card % 13 + 1;
        echo "<img class='card' src='deck/$suitName/$cardValue.png' alt='$cardValue $suitName' >";
        $total += $cardValue;
    }
    echo "<span class='individualScore'> score: $total</span>";
    echo "</div>";
    return $total;
}

function playGame($players) {
    $deck = range(0, 51);
    shuffle($deck);

    $playerScores = array();
    for ($i = 0; $i < 4; $i++) {
        echo "<div class='player'>";
        echo "<h1 id='playerName'>" . $players[$i] . "</h1>";
        $playerScores[] = playHand($deck);
        echo "</div>";
    }
    return $playerScores;
}
function averageTime(){
    $average = 0.0;
    for($i = 0; $i < count($_SESSION['times']); $i++){
        $average += $_SESSION['times'][$i];
    }
    $average /= count($_SESSION['times']);
    return $average;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 3</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <h1 class="title">SilverJack</h1>
        <?php 
            //echo "<div class='time'>";
                global $players;
                $currTime = microtime(true);
                $playerScores = playGame($players); 
                
                echo "<div class='time'>";
                grandTotal($playerScores, $players);
                $elapsedTime = microtime(true) - $currTime;
                
                
                
                ini_set("precision", 5);
                array_push($_SESSION['times'],  $elapsedTime);
                echo "<h2>Elapsed Time: " . $elapsedTime . "</h2><br>";
                echo "<h2>Average Elapsed Time: " . averageTime() . "</h2><br>";
                echo "<h2>Matches Played: " . count($_SESSION['times']) . "</h2><br>";
            echo "</div>";
        ?>
        <form>
            <input type="submit" value="Play again">
        </form>
    </body>
</html>
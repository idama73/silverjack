<?php
session_start();

function playHand(&$deck) {
    $total = 0;
    $suit = array("clubs", "hearts", "diamonds", "spades");
    echo "<hr>";
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
}

function playGame() {
    $deck = range(0, 51);
    shuffle($deck);

    $playerScores = array();
    for ($i = 0; $i < 4; $i++) {
        $playerScores[] = playHand($deck);
    }
    echo "<hr>";
    return $playerScores;
}
function averageTime(){
    $average = 0.0;
    for($i = 0; $i < count($_SESSION['session']); $i++){
        $average += $_SESSION['session'][$i];
    }
    $average /= count($_SESSION['session']);
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
        <?php 
            echo "<div class='time'>";
                $_SESSION['session'];
                
                $start = microtime(true);
                playGame(); 
                $end = microtime(true) - $start;
                
                ini_set("precision", 5);
                array_push($_SESSION['session'],  $end);
                echo "Elapsed Time: " . $end . "<br>";
                echo "Average Elapsed Time: " . averageTime() . "<br>";
                echo "Matches Played: " . count($_SESSION['session']) . "<br>";
            echo "</div>";
        ?>
        <form>
            <input type="submit" value="Play again">
        </form>
    </body>
</html>
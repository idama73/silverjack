<?php
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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 3</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <?php playGame(); ?>
    </body>
</html>
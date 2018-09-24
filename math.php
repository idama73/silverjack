<?php

function getMax ($a, $b)
{
    $maxValue = 0;
    if ($a > $b && $a <= 42)
    {
        $maxValue = $a;
    }
    
    elseif ($b > $a && $b <= 42)
    {
        $maxValue = $b;
    }
    
    elseif ($a > $b && $a > 42)
    {
        $maxValue = $b;
    }
    
    elseif ($b > $a && $b > 42)
    {
        $maxValue = $a;
    }
    
    else
    {
        $maxValue = 0;
    }
    
    return $maxValue;
}
function grandTotal ($playerScores)
{
    $winner = 0;
    $total = 0;
    
    sort($playerScores);
    
    for ($i = 0; $i < 4; $i++)
    {
        $total += $playerScores[$i];
        $winner = max($playerScores);
        if ($playerScores[$i] > 42)
        {
            $winner = $playerScores[$i - 1];
            break;
        }
        
        if (min($playerScores) > 42)
        {
            echo "No winner!";
            break;
        }
    }
    
    echo "Winner is  player with '$winner' points!";
    echo "Winner gets '$total' points!";
}
?>

<!DOCTYPE html>
<html>
    <body>
        <?php
            $arr = array(32, 46, 38, 17);
            grandTotal($arr);
        ?>
    </body>
</html>
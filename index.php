<!DOCTYPE html>
<html>
    <head>
        <title>SilverJack</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" >
    </head>
    <body>
        
        <div class ="container">
            <div>
                <center>
                <p>Welcome to Silver Jack. please enter players names.</p>
                </center>
                
                <form action="playHand.php" method="POST">
                    <div>
                        <label>Player 1:</label><input type="text" name="p1" />
                        <div />
                     <div>
                         <label>Player 2:</label><input type="text" name="p2" />
                         <div />
                      <div>
                          <label>Player 3:</label><input type="text" name="p3" />
                          <div />
                       <div>
                           <label>Player 4:</label><input type="text" name="p4" />
                           <div />
                    
                    <input type="submit" value="play" />
        
                </form> 
            </div>
        </div>
        
        
    </body>
</html>


<?php
?>
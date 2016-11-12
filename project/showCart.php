<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?php
        
        
        include 'database.php';
        $conn = getDatabaseConnection();
        if(!isset($_SESSION))
        {
            session_start();
        }
        
        $total = showCart($_SESSION['numbers']);
        echo $total;
        
        ?>

    <div> Your total is: <?= $total ?></div>

    <form action = "index.php" method = "post">
        <input type = "submit" value = "Back to Store">
    </form>

    
<?php
        unset($_SESSION["numbers"]);
        unset($_SESSION);
        session_destroy();
?>
    </body>
</html>
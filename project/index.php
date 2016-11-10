<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <body>
        
        <?php
        
        include 'database.php';
        $conn = getDatabaseConnection();
         //check if session is started
        if(!isset($_SESSION))
        {
            session_start();
        }
        
        if(isset($_POST["Clear"]))
        {
            unset($_SESSION["numbers"]);
            unset($_SESSION);
            session_destroy();
            echo "Cleared!";
        }
        
        
        
        if(!isset($_SESSION["numbers"]) && isset($_POST["Submit"]))
        {
            $_SESSION["numbers"] = array();
        }
        
        
        
        //check if value is set and push into array
        if(isset($_POST["holdThese"]) && isset($_SESSION["numbers"]))
        {
            array_push($_SESSION["numbers"], $_POST["holdThese"]);
        }
        
        //if clear history was pushed, destroy session and get rid of all
        //values in lettersFound
        if(isset($_GET["clear"]))
        {
            session_destroy();
            unset($_SESSION["lettersFound"]);
        }
        
        $testing = array(
            array(
                "first"=>1,
                "second" =>2,
                "third" =>3,
                ),
            array(
                "first"=>4,
                "second" =>5,
                "third" =>6,
                )
            );
        
        function createTable($items)
        {
            echo "<div class = table>";
            echo "<table>";
            echo "<tr>";//column name row
            echo "<td>";
            echo "First";//column name
            echo "</td>";
            echo "<td>";
            echo "Second";//column name
            echo "</td>";
            echo "<td>";
            echo "Third";//column name
            echo "</td>";
            echo "</tr>";
            foreach($items as $item)
            {
                echo "<tr>";
                foreach($item as $k)
                {
                    echo "<td>";
                    echo $k;
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        
        function printSessionArray($items)
        {
            if(isset($items))
            {
                foreach($items as $item)
                {
                    echo $item . ", ";
                }
            }
            else {
                echo "\n\nIt's not set.\n\n";
            }
        }
        
        createTable($testing);
        
        printSessionArray($_SESSION["numbers"]);
        
        ?>

    <form action = "index.php" method = "post">
        <select name = "holdThese">
            <option value = 1>1</option>
            <option value = 2>2</option>
            <option value = 3>3</option>
            <option value = 4>4</option>
            <option value = 5>5</option>
        </select>
        <input type = "submit" name = "Submit">
        <input type = "submit" value = "clear" name = "Clear">
    </form>
    
    <form action = "showCart.php" method = "post">
        <input type = "submit" name = "goToCart">
    </form>

    </body>
</html>
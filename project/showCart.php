<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?php
        
         //check if session is started
        if(!isset($_SESSION))
        {
            session_start();
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

    <form action = "showCart.php" method = "post">
        <select name = "holdThese">
            <option value = 1>1</option>
            <option value = 2>2</option>
            <option value = 3>3</option>
            <option value = 4>4</option>
            <option value = 5>5</option>
        </select>
        <input type = "submit">
    </form>

    </body>
</html>
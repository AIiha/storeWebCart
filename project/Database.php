<?php

 

    function getDatabaseConnection(){
        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "webStore";
        $username = getenv('C9_USER');
        $password = "";
        
        $GLOBALS['dbConn'] = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $GLOBALS['dbConn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        return $GLOBALS['dbConn'];
    }


    function price(){
                $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock  FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID";
                $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
           
                $stmt -> execute ();
        
                 echo "<table style='width:100%'>";
                echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> " . "<th> " . 'Price'."</th> " . "<th> " . 'Button'."</th> " . "<br />";
                 while ($row = $stmt -> fetch())  {
                     //        var_dump($row);
                    echo " <tr>";
                    echo  "<th> "  . $row['name'] . "</th> " . "<th> "   . $row['Description'] . "</th> " . "<th> ".  $row['c.categoryName'] . "</th> " . "<th> ". $row['b.brandName'] . "</th> " ."</th> " . "<th> ". $row['s.currentStock'] . "</th> " . "<th> " . $row['Price'] . "</th> "  .  "<th> " . "<button type='button'>Click Me!</button>" ."</th> " . "<br />";
                    echo " </tr>";
                
                  }
                echo "</table>";
                $GLOBALS['on'] = true;
                    
                }

?>
    

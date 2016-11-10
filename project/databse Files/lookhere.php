<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <?php
        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "otter";
        $username = getenv('C9_USER');
        $password = "";
        
        $GLOBALS['dbConn'] = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $GLOBALS['dbConn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $GLOBALS['on'] =false;
        
        
        // price desc SELECT * FROM `product` order by Price desc
        //unhealthy SELECT * FROM `product` WHERE Healthy=0
            $GLOBALS['pr'] = '10000';
            
            if($_POST['max'] >0){
                $GLOBALS['pr'] = $_POST['max'];
            }
        
            function price(){
            $sql = " SELECT * FROM `product` where price <= " . $GLOBALS['pr'] . " order by Price desc";
            $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
       
            $stmt -> execute ();
    
             echo "<table style='width:100%'>";
            echo  "<th> "  . 'ProductID' . "</th> " . "<th> "  . 'Name'. "</th> " . "<th> ".  'Description' . "</th> " . "<th> ". 'Category'. "</th> " . "<th> " .'Healthy'. "</th> " . "<th> " . 'Price'."</th> " . "<br />";
             while ($row = $stmt -> fetch())  {
                 //        var_dump($row);
                echo " <tr>";
                echo  "<th> "  . $row['ProductID'] . "</th> " . "<th> "   . $row['Name'] . "</th> " . "<th> ".  $row['Description'] . "</th> " . "<th> ". $row['Category'] . "</th> " . "<th> " . $row['Healthy'] . "</th> " . "<th> " . $row['Price'] ."</th> " . "<br />";
                echo " </tr>";
            
              }
            echo "</table>";
            $GLOBALS['on'] = true;
                
            }
            
            
            function name(){
            $sql = " SELECT * FROM `product` where price <= " . $GLOBALS['pr'] . " order by name asc";
            $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
       
            $stmt -> execute ();
    
             echo "<table style='width:100%'>";
            echo  "<th> "  . 'ProductID' . "</th> " . "<th> "  . 'Name'. "</th> " . "<th> ".  'Description' . "</th> " . "<th> ". 'Category'. "</th> " . "<th> " .'Healthy'. "</th> " . "<th> " . 'Price'."</th> " . "<br />";
             while ($row = $stmt -> fetch())  {
                 //        var_dump($row);
                echo " <tr>";
                echo  "<th> "  . $row['ProductID'] . "</th> " . "<th> "   . $row['Name'] . "</th> " . "<th> ".  $row['Description'] . "</th> " . "<th> ". $row['Category'] . "</th> " . "<th> " . $row['Healthy'] . "</th> " . "<th> " . $row['Price'] ."</th> " . "<br />";
                echo " </tr>";
            
              }
            echo "</table>";
            $GLOBALS['on'] = true;
                
            }
        
            
            function healthy(){
            $sql = " SELECT * FROM `product` WHERE Healthy=1 and price <= " . $GLOBALS['pr'] . " order by name asc";
            $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
       
            $stmt -> execute ();
    
             echo "<table style='width:100%'>";
            echo  "<th> "  . 'ProductID' . "</th> " . "<th> "  . 'Name'. "</th> " . "<th> ".  'Description' . "</th> " . "<th> ". 'Category'. "</th> " . "<th> " .'Healthy'. "</th> " . "<th> " . 'Price'."</th> " . "<br />";
             while ($row = $stmt -> fetch())  {
                 //        var_dump($row);
                echo " <tr>";
                echo  "<th> "  . $row['ProductID'] . "</th> " . "<th> "   . $row['Name'] . "</th> " . "<th> ".  $row['Description'] . "</th> " . "<th> ". $row['Category'] . "</th> " . "<th> " . $row['Healthy'] . "</th> " . "<th> " . $row['Price'] ."</th> " . "<br />";
                echo " </tr>";
            
              }
            echo "</table>";
            $GLOBALS['on'] = true;
                
            }
            
            function fruit(){
            $sql = " SELECT * FROM `product` WHERE Category='fruit' and price <= " . $GLOBALS['pr'] . " order by name asc";
            $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
       
            $stmt -> execute ();
    
             echo "<table style='width:100%'>";
            echo  "<th> "  . 'ProductID' . "</th> " . "<th> "  . 'Name'. "</th> " . "<th> ".  'Description' . "</th> " . "<th> ". 'Category'. "</th> " . "<th> " .'Healthy'. "</th> " . "<th> " . 'Price'."</th> " . "<br />";
             while ($row = $stmt -> fetch())  {
                 //        var_dump($row);
                echo " <tr>";
                echo  "<th> "  . $row['ProductID'] . "</th> " . "<th> "   . $row['Name'] . "</th> " . "<th> ".  $row['Description'] . "</th> " . "<th> ". $row['Category'] . "</th> " . "<th> " . $row['Healthy'] . "</th> " . "<th> " . $row['Price'] ."</th> " . "<br />";
                echo " </tr>";
            
              }
            echo "</table>";
            $GLOBALS['on'] = true;
                
            }
    
        
            function candy(){
            $sql = " SELECT * FROM `product` WHERE Category='candy' and price <= " . $GLOBALS['pr'] . " order by name asc";
            $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
       
            $stmt -> execute ();
    
             echo "<table style='width:100%'>";
            echo  "<th> "  . 'ProductID' . "</th> " . "<th> "  . 'Name'. "</th> " . "<th> ".  'Description' . "</th> " . "<th> ". 'Category'. "</th> " . "<th> " .'Healthy'. "</th> " . "<th> " . 'Price'."</th> " . "<br />";
             while ($row = $stmt -> fetch())  {
                 //        var_dump($row);
                echo " <tr>";
                echo  "<th> "  . $row['ProductID'] . "</th> " . "<th> "   . $row['Name'] . "</th> " . "<th> ".  $row['Description'] . "</th> " . "<th> ". $row['Category'] . "</th> " . "<th> " . $row['Healthy'] . "</th> " . "<th> " . $row['Price'] ."</th> " . "<br />";
                echo " </tr>";
            
              }
            echo "</table>";
            $GLOBALS['on'] = true;
                
            }
            
            function drink(){
            $sql = " SELECT * FROM `product` WHERE Category='drink' and price <= " . $GLOBALS['pr'] . " order by name asc";
            $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
       
            $stmt -> execute ();
    
             echo "<table style='width:100%'>";
            echo  "<th> "  . 'ProductID' . "</th> " . "<th> "  . 'Name'. "</th> " . "<th> ".  'Description' . "</th> " . "<th> ". 'Category'. "</th> " . "<th> " .'Healthy'. "</th> " . "<th> " . 'Price'."</th> " . "<br />";
             while ($row = $stmt -> fetch())  {
                 //        var_dump($row);
                echo " <tr>";
                echo  "<th> "  . $row['ProductID'] . "</th> " . "<th> "   . $row['Name'] . "</th> " . "<th> ".  $row['Description'] . "</th> " . "<th> ". $row['Category'] . "</th> " . "<th> " . $row['Healthy'] . "</th> " . "<th> " . $row['Price'] ."</th> " . "<br />";
                echo " </tr>";
            
              }
            echo "</table>";
            $GLOBALS['on'] = true;
                
            }
        
        if($_POST['helt'] ==  "helt")
            {
              $varMovie = $_POST['formMovie'];
              $varName = $_POST['formName'];
              $varGender = $_POST['formGender'];
              $errorMessage = "";
              
                healthy();
            }
            else if ($_POST['sort'] ==  "fruit") {
                fruit();
            }
            else if($_POST['sort'] ==  "price"){
                price();
            }
            else if($_POST['sort'] ==  "name"){
                name();
            }
            else if($_POST['sort'] ==  "candy"){
                candy();
            }
            else if($_POST['sort'] ==  "drink"){
                drink();
            }
            
            
            if( $GLOBALS['on'] == false){
                    //$sql = " SELECT * FROM table_name WHERE id = :id ";
                    $sql = " SELECT * FROM `product` order by Price desc";
                    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
                    //$stmt -> execute (  array ( ':id' => '1')  );
                    $stmt -> execute ();
                
                    echo "<table style='width:100%'>";
                 echo  "<th> "  . 'ProductID' . "</th> " . "<th> "  . 'Name'. "</th> " . "<th> ".  'Description' . "</th> " . "<th> ". 'Category'. "</th> " . "<th> " .'Healthy'. "</th> " . "<th> " . 'Price'."</th> " . "<br />";
                    while ($row = $stmt -> fetch())  {
                         //        var_dump($row);
                        echo " <tr>";
                        echo  "<th> "  . $row['ProductID'] . "</th> " . "<th> "  . "<a> "   . $row['Name'] . "</a> " . "</th> " . "<th > "."<div> ".  $row['Description'] . "</div> " . "</th> " . "<th> ". $row['Category'] . "</th> " . "<th> " . $row['Healthy'] . "</th> " . "<th> " . $row['Price'] ."</th> " . "<br />";
                        echo " </tr>";      
                        
                    }
                    echo "</table>";
                    
    }



        ?>
        
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        
        
     <form action="index.php" method="POST">
        Sort category: <br>
      <select name="sort">
        <option value="fruit">Fruit</option>
        <option value="candy">candy</option>
        <option value="drink">drink</option>
        <option value="price">Price</option>
        <option value="name">name</option>
      </select>    <br /><br />
     Max Price:  <input type="text" name="max" size="25"  />   <br />
      <input type="checkbox"  id="1"  name="helt"  value="helt" >
           <label for="item1">healthy</label>
      <input type="submit" value="Search Products"name="submit"  />
       </form>
        
        
        <div>
             
        </div>
         
        
        
    </body>
</html>
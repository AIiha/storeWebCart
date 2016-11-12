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



function showAll(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID  FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<tr><th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> </tr>" . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

//all products sorted by name ascending
function showAllNameAsc(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID  FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID order by name asc";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

//all products sorted by name descending
function showAllNameDesc(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID order by name desc";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}


//all products price ascending 
function showAllPriceAsc(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID order by price asc";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

//all products price Desc 
function showAllPriceDesc(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID order by price desc";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}


// filtering by brand names
function showPepperBridgeFarm(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and b.brandID = 1";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

function showCocaColaCompany(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and b.brandID = 2";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

function Kraft(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and b.brandID = 3";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

function TheFruitCompany(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and b.brandID = 4";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}
function TheCandyCompany(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and b.brandID = 5";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

//filtering by category
function Beverage(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and c.categoryID = 1";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

function Candy(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and c.categoryID = 2";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

function Fruit(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and c.categoryID = 3";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}

function DinnerFood(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and c.categoryID = 4";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
}


//all products filtred by inStock

function showAllInStock(){
    $sql = " SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID   FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and s.currentStock > 0";
    $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
    
    $stmt -> execute ();
    
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> ". 'Stock'. "</th> ". "<th> " .'Price'. "</th> "  . "<th> " . 'Button'."</th> " . "<br />";
    while ($row = $stmt -> fetch())  {
        //        var_dump($row);
        echo " <tr>";
        echo  "<th> "  . $row['name'] . "</th> " . 
        "<th> "   . $row['Description'] . "</th> " . 
        "<th> ".  $row['categoryName'] . "</th> " . 
        "<th> ". $row['brandName'] . "</th> " . 
        "<th> ". $row['currentStock'] . "</th> " . 
        "<th> " . $row['Price'] . "</th> "  .  
        "<th> " . 
            "<form action = 'index.php' method = 'post'>
            <input type='hidden' name='productID' value='".$row['productID'] . "'/>
            <input type = 'submit' name = 'Add to cart' value = 'Add to cart'>
            </form>" . "</th> " . "<br />";
        echo " </tr>";
    }
    echo "</table>";
    $GLOBALS['on'] = true;
} 




//this function runs a sql statemnt for each product in cart to retrive the information from databse
function showCart($numbers){
    $total = 0;
    echo "<table style='width:100%'>";
    echo  "<th> "  . 'Name' . "</th> " . "<th> "  . 'Description'. "</th> " . "<th> ".  'Category' . "</th> " . "<th> ". 'Brand'. "</th> " . "<th> " .'Price'. "</th> " ."<br />";
    
    
    for( $i= 0 ; $i <= sizeof($numbers) ; $i++ )
    {
        
        $sql = "SELECT name, Description, c.categoryName, b.brandName, Price, s.currentStock, p.productID FROM Product as p, brand as b, category as c, stock as s WHERE p.brandID = b.brandID and p.categoryID = c.categoryID and p.productID = s.productID and p.productID =" . intval($numbers[$i]) ."";
        $stmt = $GLOBALS['dbConn'] -> prepare ($sql);
        
        $stmt -> execute ();
        
        while($row = $stmt->fetch())
        {
            echo " <tr>";
            echo  "<th> "  . $row['name'] . "</th> " . 
            "<th> "   . $row['Description'] . "</th> " . 
            "<th> ".  $row['categoryName'] ."</th> " . 
            "<th> ". $row['brandName'] . "</th> " . 
            "<th> " . $row['Price'] . "</th> "  .  "<br />";
            echo " </tr>";
            $total += intval($row['Price']);
        }
    }
    echo "</table>";
    $GLOBALS['on'] = true;
    return $total;
}


?>
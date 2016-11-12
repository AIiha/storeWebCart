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
        
        
        if(!isset($_SESSION["numbers"]))
        {
            $_SESSION["numbers"] = array();
        }
        
        if(!isset($_SESSION['selection']))
        {
            $_SESSION['selection'] = [0,0,0,0];
        }
        
        
        
        //check if value is set and push into array
        if(isset($_POST["productID"]))
        {
            array_push($_SESSION["numbers"], $_POST["productID"]);
        }
        
        
        if(isset($_POST["Clear"]))
        {
            unset($_SESSION["numbers"]);
            unset($_SESSION['selection']);
            unset($_SESSION);
            session_destroy();
            echo "Cleared!";
        }
        if( isset($_POST['name']))
        {
            for($i = 0; $i < 4; $i++)
            {
                if($i == 0)
                {
                    $_SESSION["selection"][$i] = $_POST['name'];
                }
                else 
                    $_SESSION["selection"][$i] = 0;
            }
        }
        else if(isset($_POST['price']))
        {
            for($i = 0; $i < 4; $i++)
            {
                if($i == 1)
                    $_SESSION["selection"][$i] = $_POST['price'];
                else 
                    $_SESSION["selection"][$i] = 0;
            }
        }
        else if(isset($_POST['brand']))
        {
            for($i = 0; $i < 4; $i++)
            {
                if($i == 2)
                    $_SESSION["selection"][$i] = $_POST['brand'];
                else 
                    $_SESSION["selection"][$i] = 0;
            }
        }
        else if(isset($_POST['category']))
        {
            for($i = 0; $i < 4; $i++)
            {
                if($i == 3)
                    $_SESSION["selection"][$i] = $_POST['category'];
                else 
                    $_SESSION["selection"][$i] = 0;
            }
        }
        
        if($_SESSION["selection"][0] != 0)
        {
            if($_SESSION["selection"][0] == 1)
            {
                showAllNameAsc();
            }
            else if($_SESSION["selection"][0] == 2)
            {
                showAllNameDesc();
            }
        }
        if($_SESSION["selection"][1] != 0)
        {
            if($_SESSION["selection"][1] == 1)
            {
                showAllPriceAsc();
            }
            else if($_SESSION["selection"][1] == 2)
            {
                showAllPriceDesc();
            }
        }
        if($_SESSION["selection"][2] != 0)
        {
            if($_SESSION["selection"][2] == 1)
            {
                showPepperBridgeFarm();
            }
            else if($_SESSION["selection"][2] == 2)
            {
                showCocaColaCompany();
            }
            else if($_SESSION["selection"][2] == 4)
            {
                Kraft();
            }
            else if($_SESSION["selection"][2] == 3)
            {
                TheFruitCompany();
            }
            else if($_SESSION["selection"][2] == 5)
            {
                TheCandyCompany();
            }
        }
        if($_SESSION["selection"][3] != 0)
        {
            if($_SESSION["selection"][3] == 1)
            {
                Beverage();
            }
            else if($_SESSION["selection"][3] == 2)
            {
                Candy();
            }
            else if($_SESSION["selection"][3] == 3)
            {
                Fruit();
            }
            else if($_SESSION["selection"][3] == 4)
            {
                DinnerFood();
            }
        }
        
        
        
        ?>

    <div>
        Sort by:
        </br>
        <div>
            Name:
            <form action = 'index.php' method = 'post'>
                <select name = 'name'>
                    <option value = 0></option>
                    <option value = 1>Ascending</option>
                    <option value = 2>Descending</option>
                </select>
                <input type = "submit" name = "Submit">
                <input type = "submit" value = "clear" name = "Clear">
            </form>
                
                </br>
        </div>
        <div>
            Price:
            <form action = 'index.php' method = 'post'>
                <select name = 'price'>
                    <option value = 0></option>
                    <option value = 1>Ascending</option>
                    <option value = 2>Descending</option>
                </select>
                <input type = "submit" name = "Submit">
                <input type = "submit" value = "clear" name = "Clear">
            </form>
                </br>
        </div>
        <div>
            Brand:
            <form action = 'index.php' method = 'post'>
                <select name = 'brand'>
                    <option value = 0></option>
                    <option value = 1>Pepper Bridge Farms</option>
                    <option value = 2>Coca Cola</option>
                    <option value = 3>Fruit Company</option>
                    <option value = 4>Kraft</option>
                    <option value = 5>Candy Company</option>
                </select>
                <input type = "submit" name = "Submit">
                <input type = "submit" value = "clear" name = "Clear">
            </form>
                </br>
        </div>
        <div>
            Only show:
            <form action = 'index.php' method = 'post'>
                <select name = 'category'>
                    <option value = 0></option>
                    <option value = 1>Beverage</option>
                    <option value = 2>Candy</option>
                    <option value = 3>Fruit</option>
                    <option value = 4>Dinner Food</option>
                </select>
                <input type = "submit" name = "Submit">
                <input type = "submit" value = "clear" name = "Clear">
            </form>
                </br>
        </div>
    </div>
    
    
    </br>
    </br>
    </br>
    <form action = "showCart.php" method = "post">
        <input type = "submit" name = "goToCart" value = "Checkout">
    </form>


    </body>
</html>
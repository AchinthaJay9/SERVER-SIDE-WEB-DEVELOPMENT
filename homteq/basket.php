<?php
session_start();

include("db.php");

$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if (isset($_POST['hiddenfield']))
{
    $delprodid = $_POST['hiddenfield'];
    unset($_SESSION['basket'][$delprodid]);
    echo "<p>1 item removed from the basket</p>";
}

$newprodid;
$reququantity;


if (isset($_POST["h_prodid"]))
{
    $newprodid = $_POST["h_prodid"];
    $reququantity = $_POST["p_quantity"];

    //echo "<p>Selected product id is ".$newprodid."</p>";
    //echo "<p>Quantity is ".$reququantity."</p>";

    $_SESSION['basket'][$newprodid] = $reququantity;
    echo "<p>1 item with product id ".$newprodid." added</p>";
}

if (isset($_SESSION['basket']))
{
    echo "<form action='basket.php' method='post'>";
    echo "<table>";

    echo "<tr>";
    echo "<th>Product name</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";
    echo "<th>Subtotal</th>";
    echo "<th>Remove Product</th>";
    echo "</tr>";

    $total = 0;

    foreach ($_SESSION['basket'] as $index => $value)
    {
        $SQL = "select prodName, prodPrice from Product WHERE prodId=$index";
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        $arrayp = mysqli_fetch_array($exeSQL);

        $subtotal = ($arrayp['prodPrice'] * $value);
        $total = ($total + $subtotal);

        echo "<tr>";
        echo "<td>".$arrayp['prodName']."</td>";
        echo "<td>".$arrayp['prodPrice']."</td>";
        echo "<td>".$value."</td>";
        echo "<td>".$subtotal."</td>";
        echo "<input type='hidden' name='hiddenfield' value=".$index.">";
        echo "<td><button type='submit'>Remove</button></td>";
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td colspan='4'>Total</td>";
    echo "<td>".$total."</td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
}
else{
    echo "<p>Empty basket</p>";
}

echo "<br>";
echo "<p><a href='clearbasket.php'>CLEAR BASKET</a></p>";
echo "<br>";
echo "<p>New homteq customers <a href='signup.php'>Sign Up</a></p>";
echo "<br>";
echo "<p>Returning homteq customers <a href='login.php'>Login</a></p>";

include("footfile.html"); //include head layout

echo "</body>";
?>

    

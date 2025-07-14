<?php
session_start();

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
}

if(isset($_GET["action"]) && $_GET["action"] == "add" && isset($_GET["id"])){
    $_SESSION["cart"] [] = $_GET["id"];
}

echo "<h2>Cart Items</h2>";
foreach ($_SESSION["cart"] as $item){
    echo "product ID: " . $item . "<br>";
}
?>

<a href="checkout.php">Proceed to Checkout</a>
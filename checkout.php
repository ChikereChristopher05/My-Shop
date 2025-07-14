<?php
session_start();
include "includes/config.php";

if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit;
}

$total_price = 0;
foreach($_SESSION["cart"] as $item){
    $stmt = $db->prepare("SELECT price FROM products WHERE id = ?");
    $stmt->bind_param("i", $item);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $total_price += $result["price"];
}

$stmt = $db->prepare("INSERT INTO orders (user_id, total_price) VALUES (?, ?)");
$stmt->bind_param("id", $_SESSION["user_id"], $total_price);
$stmt->execute();
$_SESSION["cart"] = [];

echo "Order placed successfully!";
?>
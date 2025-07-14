<?php
include "../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $price = $_POST["price"];
    $desc = $_POST["description"];
    $stmt = $db->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $name, $price, $desc);
    $stmt->execute();
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Product Name" required><br><br>
    <input type="text" name="price" placeholder="Price" required><br><br>
    <textarea name="description" placeholder="Description" required></textarea><br><br>
    <button type="submit">Add Product</button>
</form>
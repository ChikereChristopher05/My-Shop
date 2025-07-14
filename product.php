<?php
include "includes/config.php";

$id = $_GET["id"];

$stmt = $db->prepare("SELECT * FROM products WHERE id = ?");

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$product = $result->fetch_assoc();
?>

<h1><?php echo $product["name"]; ?></h1>
<img src="assets/images/<?php echo $product["image"]; ?>" width="200" alt="">
<p><?php echo $product["description"]; ?></p>
<p>Price: <?php echo $product["price"]; ?></p>
<a href="cart.php?action=add&id=<?php echo $product["id"]; ?>">Add to cart</a>
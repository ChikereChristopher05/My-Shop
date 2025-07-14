<?php
include "includes/config.php";

$result = $db->query("SELECT * FROM products");

while($row = $result->fetch_assoc()){
    echo "<div>
            <img src='assets/images/". $row["image"]."' width='100'>
            <h3?>".$row["name"]."</h3>
            <p>".$row["price"]."</p>
            <a href='product.php?id=" . $row["id"]. "'>View Details</a>
         </div>";
}
?>
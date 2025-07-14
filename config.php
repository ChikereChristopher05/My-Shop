<?php
$db = new mysqli("localhost", "root", "", "ecommerce");

if($db->connect_error){
    die("connection failed: " . $db->connect_error);
}
?>
<?php
function isAdmin(){
    return isset($_SESSION["user_role"]) && $_SESSION["user_role"] === "admin";
}

function isCustomer(){
    return isset($_SESSION["user_role"]) && $_SESSION["user_role"] === "customer";
}

function isLoggedIn(){
    return isset($_SESSION["user_id"]);
}

function formatPrice($price){
    return "$" . number_format($price, 2);
}

function redirect($url){
    header("Location: $url");
    exit;
}
?>
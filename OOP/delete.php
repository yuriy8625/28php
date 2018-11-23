<?php
header("Location:list.php");

session_start();
include "oop_cart.php";

$cart = new Cart($_SESSION['cart']);

$cart->delete($_GET['id']);

?>
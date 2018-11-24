<?php
header("Location:list.php");

session_start();
include "oop_cart.php";

$cart = new Cart();

$cart->delete($_GET['id']);

?>
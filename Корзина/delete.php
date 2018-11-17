<?php
header("Location:list.php");

session_start();
include "cart.php";

remove($cart, $_GET['id']);

?>
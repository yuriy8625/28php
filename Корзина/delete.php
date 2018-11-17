<?php
header("Location:list.php");

session_start();
include "cart.php";

$delete = $_SESSION['cart'];
remove($delete, $_GET['id']);

?>
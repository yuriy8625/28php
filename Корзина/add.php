<?php
session_start();
include "cart.php";

$products = [
	2=>['name'=>'товар-1', 'price'=>233],
	7=>['name'=>'товар-2', 'price'=>333],
	43=>['name'=>'товар-3', 'price'=>332]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>add.php</title>
</head>

<body>
<a href="list.php">list.php</a>
	<form action="" method="GET">
	<label for="product">Выберите товар:
		<select name="product">
			<option></option>
			<?php 
				foreach ($products as $key => $value) {
					echo "<option value=\"".$key."\">".$value['name']."</option>";
				}
			?>
		</select><br><hr>
	</label>
	<label for="quantity">Кол-во:
		<input type="number" value="" name="quantity">
	</label><br><hr>
	<input type="submit" name="submit" value="В корзину">

<?php

	if(!empty($_GET['product']) && $_GET['quantity'] > 0) {

	 	$cart = add($cart, $_GET['product'], $_GET['quantity'],$products[$_GET['product']]['price']);

	}

var_dump($cart);
var_dump($_SESSION);
?>
</form>

</body>
</html>
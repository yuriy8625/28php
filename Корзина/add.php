<?php
session_start();
?>
<?php
include "cart.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>add.php</title>
</head>

<body>
	
	<form action="" method="GET">
	<label for="product">Выберите товар:
		<select name="product">
			<option></option>
			<option value="товар-1">Товар_1</option>
			<option value="товар-2">Товар_2</option>
			<option value="товар-3">Товар_3</option>
		</select><br><hr>
	</label>
	<label for="quantity">Кол-во:
		<input type="number" value="" name="quantity">
	</label><br><hr>
	<input type="submit" name="submit" value="В корзину">

<?php

$products = [
	2=>['name'=>'товар-1', 'price'=>233],
	7=>['name'=>'товар-2', 'price'=>333],
	43=>['name'=>'товар-3', 'price'=>332]
];

if(isset($_GET['submit']) && !empty($_GET['product']) && $_GET['quantity'] > 0) {

			foreach ($products as $key => $value) {

				if($value['name'] == $_GET['product']) {
					$cart = add($cart, $_GET['product'], $_GET['quantity'], $products[$key]['price']);
				}
			}	
	}

// var_dump($_GET);
var_dump($cart);
// $_SESSION = [];
?>
</form>

</body>
</html>
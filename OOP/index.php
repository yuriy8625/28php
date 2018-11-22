<?php
session_start();
include "oop_cart.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index.php</title>
</head>

<body>
<a href="oop_cart.php">oop_cart.php</a><br>
<a href="list.php">list.php</a><hr>
	<form action="" method="GET">
	<label for="product">Выберите товар:
		<select name="product">
			<option></option>
			<?php 
				foreach ($products as $key => $value) {
					echo "<option value=\"".$key."\">".$value['name']."</option>";
				}
			?>
		</select><br><br>
	</label>
	<label for="quantity">Кол-во:
		<input type="number" value="" name="quantity">
	</label><br><br>
	<input type="submit" name="submit" value="В корзину"><hr>

<?php
$cart = new Cart();

	if(!empty($_GET['product']) && $_GET['quantity'] > 0) {

	 	$cart->add($_GET['product'], $_GET['quantity'],$products[$_GET['product']]['price']);

	}

var_dump($cart->items);
var_dump($_SESSION['cart']);
?>
</form>

</body>
</html>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
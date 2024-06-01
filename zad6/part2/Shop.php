<?php
include_once('Product.php');
include_once('Cart.php');

$product1 = new Product("Książka", 20, 1);
$product2 = new Product("Długopis", 2, 5);
$product3 = new Product("Telefon", 1000, 1);
$products = array($product1, $product2, $product3);
$cart = new Cart();
foreach($products as $product) {
    $cart->addProduct($product);
}
echo $cart;
echo "<br>";
$cart->removeProduct($product2);
echo $cart;
?>
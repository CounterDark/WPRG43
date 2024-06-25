<?php
require_once('Product.php');
class Cart {
    private array $products;
    private float $totalPrice;

    public function __construct() {
        $this->products = array();
        $this->totalPrice = 0;
    }

    public function addProduct(Product $product): void {
        $this->products[] = $product;
        $this->totalPrice += $product->getPrice();
    }

    public function removeProduct(Product $product): void {
        $index = array_search($product, $this->products);
        if($index !== false) {
            $this->totalPrice -= $product->getPrice();
            unset($this->products[$index]);
        }
    }

    public function getTotalPrice(): float {
        return $this->totalPrice;
    }

    public function __toString(): string {
        $result = "Cart:<br>";
        foreach($this->products as $product) {
            $result .= $product."<br>";
        }
        $result .= "Total price: ".$this->totalPrice;
        return $result;
    }
}
?>
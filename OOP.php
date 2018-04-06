<?php
class Product {	
	protected $type;
	protected $price = 0;
	const MARKET_NAME = 'Internet shop';

	public function __construct($type, $price = 0){
		$this->type = $type;
		$this->price = $price;
	}

	public function setInfo(array $info){
		foreach ($info as $key => $item){
			$this->{$key} = $item;
		}
	}

	public static function getMarketName(){
		return self::MARKET_NAME;
	}

	// abstract function getProductAttributes();
}

class ProductPhone extends Product{

	public function __construct($price){
		parent::__construct('phone', $price);
	}

	// public function getProductAttributes(){
	// 	return[];
	// }

	public function getPrice(){
		return $this->price;
	}

}


$name = Product::getMarketName();

$phone = new ProductPhone(1000);
$camera = new Product('camera', 15000);

$price = $phone->getPrice();

// $phone->type = 'phone';
// $phone->price = 1000;

// $info = [
// 'type' => 'phone',
// 'price' => 2000,
// ];

// $phone->setInfo($info);
// $phone->getPrice();


var_dump($phone);
?>
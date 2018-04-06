<?php
echo ' Laptop ';
// include 'Product.php';

class Laptop extends Product {

	protected $data = [
		'products' => [
		'name',
		'description',
		'price',
		],

		'cores' => [
		'model',
		'cores',
		'f' => 'frequency',
		],
	];

	protected $joins_data = [
		[
	    	'type' => 'LEFT',
	    	'base_table' => 'products',
	    	'join_table' => 'products_core',
	    	'base_table_key' => 'id',
	    	'join_table_key' => 'product_id',
	  	],

	  	[
	    	'type' => 'INNER',
	    	'base_table' => 'products_core',
	    	'join_table' => 'cores',
	    	'base_table_key' => 'core_id',
	    	'join_table_key' => 'id',
	  	],
	];


	public function __construct($data, $joins_data) {
		$this->data = $data;
		$this->joins_data = $joins_data;
	}	
}
?>
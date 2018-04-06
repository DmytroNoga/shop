<?php

class Laptop extends Product{

	protected $formElements = [
		
		'name' => [
			'title' => 'Name',
			'type' => 'text',
			'table' => 'products',
			'field' => 'name',
		],

		'description' => [
			'title' => 'Description',
			'type' => 'textarea',
			'table' => 'products',
			'field' => 'description',
		],

		'price' => [
			'title' => 'Price',
			'type' => 'number',
			'table' => 'products',
			'field' => 'price',
			'step' => 0.1,
			'min' => 0,
		],

		'core' => [
			'title' => 'Core',
			'type' => 'select',
			'table' => 'products_core',
			'values' => [
				'table' => 'cores',
				'value' => 'id',
				'title' => 'model',

			],
			'field' => 'core_id',
		],
	];
}
?>
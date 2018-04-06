<?php

class Car extends Product{

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

		'doors' => [
			'title' => 'Doors',
			'type' => 'number',
			'table' => 'product_doors',
			'field' => 'count_doors',
			'step' => 1,
			'min' => 0,
			'max' => 255,
		],

		'engine' => [
			'title' => 'Engine Power',
			'type' => 'number',
			'table' => 'product_engine',
			'field' => 'engine',
			'step' => 0.1,
			'min' => 0,
			'max' => 25,
		],

		'engine_type' => [
			'title' => 'Engine Type',
			'type' => 'select',
			'table' => 'product_engine',
			// 'values' => [
			// 	'b' => 'Gas',
			// 	'd' => 'Diesel',
			// 	'g' => 'LPG',
			// ],
			'values' => [
				'table' => 'product_engine',
				'value' => 'engine_type',
				'title' => 'engine_type',
			],
			'field' => 'engine_type',
		]

		//'core' => [
		// 	'title' => 'Core',
		// 	'type' => 'select',
		// 	'table' => 'products_core',
		// 	'values' => [
		// 		'table' => 'cores',
		// 		'value' => 'id',
		// 		'title' => 'model',

		// 	],
		// 	'field' => 'core_id',
		// ],

	];
}

?>
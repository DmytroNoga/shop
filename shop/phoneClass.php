<?php
class Phone extends Product{

	protected $formElements = [

		// 'type' => [
		// 	'title' => 'Type',
		// 	'type' => 'select',
		// 	'table' => 'products',

		// 	'values' => [
		// 		'table' => 'products',
		// 		// 'value' => 'type',
		// 		'title' => 'type',

		// 	],
		// 	'field' => 'core_id',
		// ],

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

		'camera' => [
			'title' => 'Camera',
			'type' => 'number',
			'table' => 'product_camera',
			'field' => 'quality',
			'step' => 0.1,
			'min' => 0,
		],

		
		'images[]' => [
			'title' => 'Photo',
			'type' => 'file',
			'table' => 'product_files',
			'field' => 'delta',
		]

	];
}
?>
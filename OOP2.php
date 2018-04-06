<?php
class Product {	
	// protected $type;
	// protected $price = 0;

	// public function __construct($type, $price = 0){
	// 	$this->type = $type;
	// 	$this->price = $price;
	// }

	public function buildForm($type = 'add') {
		// $form_elements = parent::formElements + this->formElements;
	    $form = '';
	    foreach ($this->formElements as $name => $element) {
	     if(in_array($element['type'], ['select', 'number', 'text', 'textarea'])){
	      	$form .=  '<label for="' . $name . '">' . $element['title'] . '</label>';
	 	 }
	      switch ($element['type']) {
	        case 'select':
	          $form .=  '<select name="' . $name . '" id="' . $name . '">';
	          $form .= $this->getSelectValues($element['values']);
	          $form .=  '</select>';
	          
	          break;

	        case 'number':
	          $form .= '<input type="number" name="' . $name . '" id="' . $name . '"';
	          $form .= isset($element['step']) ? ' step="' . $element['step'] . '"' : '';
	          $form .= isset($element['min']) ? ' min="' . $element['min'] . '"' : '';
	          $form .= isset($element['max']) ? ' max="' . $element['max'] . '"' : '';
	          $form .=  '>';
	          break;

	        case 'text':
	          $form .= '<input type="text" name="' . $name . '" id="' . $name . '"';
	          $form .= isset($element['placeholder']) ? ' placeholder="' . $element['placeholder'] . '"' : '';
	          
	          // $form .= isset($element['step']) ? ' step="' . $element['step'] . '"' : '';

	          $form .=  '>';
	          break;

	        case 'textarea':
	          $form .= '<textarea name="' . $name . '" id="' . $name . '"></textarea>';
	        break;

	        case 'checkbox':
	          $form .= '<input type="checkbox" name="' . $name . '" id="' . $name . '"';

	          $form .= '>';
	          break;
	      }
	      $form .=  '<br>';
	    }

	    return $form;
	  }

	  public function getSelectValues(array $info, $dafault_value = NULL) {
	    $q = 'SELECT ' . $info['value'] . 'as value' . ', ' . $info['title'] . 'as title' . ' FROM ' . $info['table'] .';';
	    
	    $result = mysqli_query($mysql, $q);

	    $options = '';
	    $result = [];

	    foreach ($result as $item) {
	      $options .= '<option value="' . $item['value'] .'"';
	      $options .= ($item['value'] == $dafault_value) ? ' selected': '';
	      $options .= '>';
	      $options .= $item['title'];
	      $options .= '</option>';
	    }

	    return $options;
	  }
}

class Phone extends Product{

	protected $formElements = [
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
		]

	];
}

class Laptop extends Product{

	protected $formElements = [
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

class Car extends Product{

	protected $formElements = [
		'doors' => [
			'title' => 'Doors',
			'type' => 'number',
			'table' => 'product_doors',
			'field' => 'count_doors',
		],
		'engine' => [
			'title' => 'Engine',
			'type' => 'number',
			'table' => 'product_engine',
			'values_list' => [
				'b' => 'Gas',
				'd' => 'Diesel',
				'g' => 'LPG',
			],
			// 'field' => 'quality',
			'step' => 1,
			'min' => 1,
		]

	];
}

$phone = new Phone();
// $camera = new Product('camera', 15000);
$form = $phone->buildForm();

echo $form;
// var_dump($phone);
// var_dump($form);

?>

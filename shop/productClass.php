<?php
class Product {	
	public function buildForm($type = 'add') {
		// $form_elements = parent::formElements + this->formElements;
	    $form = '<table border="1"><form action="" method="Post" enctype="multipart/form-data"><tr>';

	    foreach ($this->formElements as $name => $element) {
	     if(in_array($element['type'], ['select', 'number', 'text', 'textarea'])){
	    
	      	$form .=  '<td><label for="' . $name . '">' . $element['title'] . ' </label></td>';
  			$form .=  '<td>';

	 	 }
	      switch ($element['type']) {
	        case 'select':
	          $form .= '<select name="' . $name . '" id="' . $name . '">';
	          $form .= $this->getSelectValues($element['values']);          
	          $form .= '</select>';
    
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

	        case 'file':
	          $form .= '<input type="file" name= "'. $name .'" multiple "';
	          $form .= '>';

	          break;
	      }
	       $form .=  '</td></tr>';
	    }
	    $form .= '</td></tr></table><td colspan="2"><input type="submit" value="OK"></td></form>';

	    return $form;

	}

	public function getSelectValues(array $info, $dafault_value = NULL) {
	    if(isset($info['title'])){
		    $q .= 'SELECT DISTINCT ' . $info['title'] . ' as title';
		    $q .= isset($info['value']) ? ', ' . $info['value'] . ' as value' : '';	 
		    $q .= ' FROM ' . $info['table'] .';';
		}


// $form .= isset($element['max']) ? ' max="' . $element['max'] . '"' : '';

	    include 'dbconnect.php';
	    $result = mysqli_query($mysql, $q);
	    $options = '';

	    foreach ($result as $item) {
	      $options .= '<option value="' . $item['value'] .'"';
	      $options .= ($item['value'] == $dafault_value) ? ' selected': '';
	      $options .= '>';
	      $options .= $item['title'];
	      $options .= '</option>';
	    }

	    return $options;
	}

	  	public function insertValues(array $info, $dafault_value = NULL) {
			include 'dbconnect.php';
			$q .= "INSERT INTO `products` (`name`, `description`, `price`, `type`) VALUES";
        	$q .= "('" . $_POST['name'] . "', '" . $_POST['description'] . "', '" . $_POST['price'] . "', '" . $_POST['type'] . "')";

	// $form .= isset($element['max']) ? ' max="' . $element['max'] . '"' : '';

		    var_dump($q);
		    $result = mysqli_query($mysql, $q);
		    $options = '';

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
?>
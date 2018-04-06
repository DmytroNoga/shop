<?php

abstract class Product {	


	public function __construct($joins_data) {
		$this->joins_data = $joins_data;
		global $mysqli;
		var_dump($mysqli);
	}

	public function Join(){
		$joins = [];

		foreach ($joins_data as $join) {
  			$joins[] = $join['type'] . ' JOIN ' . $join['join_table']
    		. ' ON ' . $join['base_table'] . '.' . $join['base_table_key']
    		. ' = ' . $join['join_table'] . '.' . $join['join_table_key'];
		}
	
		$joins_str = implode(' ', $joins);

		$coloumns = [];
		
		foreach ($data as $table => $items) {
  			foreach ($items as $alias => $field) {
    			$alias = is_string($alias) ? " AS $alias" : '';
   				$coloumns[] = "$table.$field$alias";
  			}
		}

		$fields = implode(', ', $coloumns);

		echo "SELECT $fields FROM products $joins_str;";
	}

}

?>
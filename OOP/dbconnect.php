<?php

class Connect{

	public $host; 
	public $database; 
	public $user; 
	public $password; 

	public function __construct($host, $database, $user, $password){
		$this->host = $host;
		$this->database = $database;
		$this->user = $user;
		$this->password = $password;
	}
}

$mysqli = new Connect('localhost', 'courses', 'root', '1234');

// var_dump($mysqli);
?>

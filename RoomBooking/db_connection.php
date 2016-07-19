<?php

class DB {

	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $sql;

	function __construct(){
		$this->servername = "localhost";
		$this->username = "test";
		$this->password = "test";
		$this->dbname = "book";
		$this->sql = "";
		$this->conn = "";

	}
	public function connect() {

		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die('Error with MySQL connection');
		$this->conn = $conn;
		mysqli_query($conn , 'SET CHARACTER SET utf8');
	}

	public function query($input_sql) {
		$this->sql = $input_sql;

		$result = mysqli_query($this->conn , $this->sql);

		return $result;
	}
}

<?php
class Database{
	public $con;
	public function __construct(){
		$this->con = mysqli_connect("localhost", "root", "", "provab_demo");
		if (!$this->con) {
			die("Connection Error ").mysqli_errors();
		}
	}
}
$obj = new Database();
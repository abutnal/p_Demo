<?php
require_once('database.php');
class CrudOperation extends Database{
	// SELECT ALL RECORDS
	public function select_all($table){
		$sql = "";
		$sql .="SELECT * FROM ".$table;
		$array = array();
		$query = mysqli_query($this->con, $sql);
		while($row = mysqli_fetch_assoc($query)):
			$array[] = $row;
		endwhile;
		return $array;
	}

	// SELECT ONE RECORD
	public function select_one($table, $where){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			$condition .= $key.="='".$value."'";
		}
		$sql .="SELECT * FROM ".$table." WHERE ".$condition;
		$array = array();
		$query = mysqli_query($this->con, $sql);
		while($row = mysqli_fetch_assoc($query)):
			$array[] = $row;
		endwhile;
		return $array;
	}

	// INSERT Method
	public function insert($table, $data){
		$sql = "";
		$sql .= "INSERT INTO ".$table." (".implode(", ", array_keys($data)).") VALUES ('".implode("', '", array_values($data))."')";
		$query = mysqli_query($this->con, $sql);
		if ($query) {	
			return true;
		}
	}


	// UPDATE Method
	public function update($table, $data, $where){
		$sql ="";
		$condition="";
		foreach ($where as $key => $value) {
			$condition .= $key."='".$value."' AND "; 
		}

		foreach ($data as $key => $value) {
			$sql .= $key."='".$value."', "; 
		}
		$sql = substr($sql, 0,-2);
		$condition = substr($condition, 0,-5);
		$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
		$query = mysqli_query($this->con,$sql);
		if ($query) {
			return true;
		}
	}

	// Delete method
	public function delete($table,$where){
		$sql = "";
		$condition="";
		foreach ($where as $key => $value) {
			$condition .= $key .="='".$value."' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql .= "DELETE FROM ".$table." WHERE ".$condition;
		$query = mysqli_query($this->con, $sql);
		if ($query) {
			return true;
		}
	}
}
$objCrud = new CrudOperation();
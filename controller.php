<?php 

include_once('interface2.php');
include_once('Dbconnect.php');


class Controller implements interface2{
	
	public $conn ; 
	
	function __construct(){
		$db = new Dbconnect();
		$this->conn = $db->connect();
	}
	
	public function insert($table , $value){
	
		$field = "";
		$val = "";
		$i = 0;
			
		foreach($value as $k=>$v){
			if($i == 0){
				$field.=$k;
				$val.="'".$v."'";
			}else{
				$field.= ", ".$k;
				$val.=",'".$v."'";
			}
			$i++;
		}
		//print_r("insert into $table($field) values($val)");exit;
		return mysqli_query($this->conn,"insert into $table($field) values($val)");
	
	}
	public function select($table , $where){
		
		if($where != ''){
			$where = " Where $where";
		}
		
		$query = mysqli_query($this->conn , "select * from $table $where");
		
		return $query;
	
	}
	
	public function update($table , $value , $where){
		
		if($where != ''){
			$where = " Where $where ";
		}
		
		$val = "";
		$i = 0;
		
		foreach($value as $k=>$v){
			if($i == 0){
				$val.= $k."='".$v."'";
			}else{
				$val .=",".$k." = '".$v."'";
			}
		 $i++;	
		}
		
		return mysqli_query($this->conn, "UPDATE $table set $val $where");
	}

	public function delete($table ,$where){
	
		if($where != ''){
			$where = " Where $where";
		}
		
		return mysqli_query($this->conn, "Delete from $table $where");
		
	}


}


?>
<?php 

	interface interface2{
	
		function insert($table,$value);
		function delete($table,$where);
		function update($table,$value,$where);
		function select($table,$where);
	}

?>
<?php 
	/**
	* Model class having crud operations
	*/
	class Model
	{
		var $table_name = "";
		var $pk = "";
		var $soft_delete;
		var $dbContext;
		function __construct($dbc)
		{
			$dbc = is_array($dbc)?$dbc[0]:$dbc;
			if(empty($this->table_name)){
				new CException("Model should have a table", CException::THROW_CUSTOM);
			}
			if(empty($this->pk)){
				new CException("Model should have a primary key", CException::THROW_CUSTOM);
			}
			$this->dbContext = $dbc;
		}
		function last_error(){
			return $dbContext->getError();
		}
		function insert($record)
		{
			$arg    = $record;			
			$sql    = "INSERT INTO ".$this->table_name;
			$arg    = (array) $arg;
			$keys   = [];
			$values = [];
			foreach ($arg as $key => $value) {
				$keys[] = $key;
				$values[] = "'" . $this->dbContext->escapeString($value) . "'";
			}
			$sql .= "(" . implode(",", $keys).  ") VALUES(" . implode(",", $values) . ")";
			return $this->dbContext->exec($sql);
		}

		function delete(){
			$id = func_get_arg(0);
			$sql = "Delete from " . $this->table_name. " where ". $this->pk . " = '$id'";
			return $this->dbContext->exec($sql);
		}
		function update($id, $record){
			$arg    = $record;			
			$sql    = "UPDATE ".$this->table_name." SET ";
			$values = [];
			foreach ($arg as $key => $value) {
				$values[] = "$key = '" . $this->dbContext->escapeString($value) . "'";
			}
			$sql .= implode(",", $values);
			$sql .= " WHERE ".$this->pk."= '$id'";
			return $this->dbContext->exec($sql);
		}
		function get(){
			$id     = func_get_arg(0);			
			$sql    = "SELECT * from ".$this->table_name. " WHERE ".$this->pk." = '$id'";
			$result = $this->dbContext->query($sql);
			return $result->fetchArray();
		}
		function get_many($limit = 100){
			$sql    = "SELECT * from ".$this->table_name. " limit $limit";
			$result = $this->dbContext->query($sql);
			$records = [];
			while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
				$records[] = $row;
			}
			return $records;
		}
		function set_where($where)
		{

		}
		function update_by()
		{

		}
		function delete_by(){

		}
		function get_by(){

		}
	}
?>
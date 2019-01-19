<?php
/**
 * 
 */
class CatModel extends DModel{
	
	public function __construct(){
		parent::__construct();
	}
	public function catList($tableName ){
		$sql   = "SELECT * FROM $tableName";
	    return $this->db->select($sql);
	}
	public function catByid($tableName, $id ){
		$sql   = "SELECT * FROM $tableName WHERE id=:id ";
		$data  = array(':id' => $id, );
		return $this->db->select($sql, $data);
	}
	public function insertCat($tableName, $data){
		return $this->db->insert($tableName, $data);
	}
	public function catUpdate($tableName, $data, $cond){
		$this->db->update($tableName, $data, $cond);
	}
	public function catDelete($tableName, $cond){
		return $this->db->delete($tableName, $cond);
	}
}
?>
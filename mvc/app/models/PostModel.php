<?php
/**
 * 
 */
class PostModel extends DModel{
	
	public function __construct(){
		parent::__construct();
	}
	public function getallPost($tableName ){
		$sql   = "SELECT * FROM $tableName order by id desc limit 3";
	    return $this->db->select($sql);
	}
	public function getPostList($tableName ){
		$sql   = "SELECT * FROM $tableName order by id desc";
	    return $this->db->select($sql);
	}
	public function getallPostById($tablePost, $tableCategory, $id){

		$sql = "SELECT $tablePost.*, $tableCategory.name  
		FROM $tablePost INNER JOIN $tableCategory  
        ON $tablePost.cat = $tableCategory.id
        WHERE $tablePost.id = $id";
	    return $this->db->select($sql);

	}
	public function getallPostByCat($tablePost, $tableCategory, $id){

		$sql = "SELECT $tablePost.*, $tableCategory.name  
		FROM $tablePost INNER JOIN $tableCategory  
        ON $tablePost.cat = $tableCategory.id
        WHERE $tableCategory.id = $id";
	    return $this->db->select($sql);

	}
	public function getLetestPost($tableNamePost){
        $sql   = "SELECT * FROM $tableNamePost order by id desc limit 5";
	    return $this->db->select($sql);
	}
	public function searchPostByCat($tableNamePost, $keyword, $cat){

		if (isset($keyword) && !empty($keyword)) {
			$sql   = "SELECT * FROM $tableNamePost WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
		}elseif (isset($cat)) {
			$sql   = "SELECT * FROM $tableNamePost WHERE cat = $cat";
		}
		
	    return $this->db->select($sql);
	    }
	    public function insertPost($tableNamePost, $data){
		return $this->db->insert($tableNamePost, $data);
	}
	

	}

?>
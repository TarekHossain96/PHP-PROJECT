<?php
/**
 * 
 */
class Category extends Dcontroller{
	
	function __construct(){
		parent::__construct();
	}
	/*public function categoryList(){
		$data = array();
		$tableName = "category";
		$CatModel = $this->load->model("CatModel");
		$data['cat'] = $CatModel->catList($tableName );
		$this->load->view("category", $data);
	}*/
	public function catById(){
		$data = array();
		$tableName = "category";
		$id = 1;
		$CatModel = $this->load->model("CatModel");
		$data['catbyId'] = $CatModel->catByid($tableName, $id);
        $this->load->view("catbyId", $data);
	}
	/*public function addCategory(){
		$this->load->view("addCategory");
	}*/
	/*public function inserCategory(){
		$tableName = "category";
        $name = (isset($_POST['name']) ? $_POST['name'] : '');
		$title = (isset($_POST['title']) ? $_POST['title'] : '');
		
		$data = array( 

               'name'  => $name,
               'title' => $title
		);
      

		$CatModel = $this->load->model("CatModel");
		$CatModel->insertCat($tableName, $data);
	}*/
	/*public function editCategory(){
		$data = array();
		$tableName = "category";
		$id = 1;
		$CatModel = $this->load->model("CatModel");
		$data['catbyId'] = $CatModel->catByid($tableName, $id);
        $this->load->view("updateCategory", $data);
		
	}*/
	/*public function updateCat(){
		$tableName = "category";
		
		$id = (isset($_POST['id']) ? $_POST['id'] : '');
		$name = (isset($_POST['name']) ? $_POST['name'] : '');
		$title = (isset($_POST['title']) ? $_POST['title'] : '');
		$cond = "id=$id ";
		
		$data = array( 

               'name'  => $name,
               'title' => $title
		);
		$CatModel = $this->load->model("CatModel");
		return $CatModel->catUpdate($tableName, $data, $cond);
        
	}*/
	/*public function deleteCatById(){
		$tableName = "category";
		$cond = "id=2";
		$CatModel = $this->load->model("CatModel");
		return $CatModel->catDelete($tableName, $cond);
        
	}*/

}
?>
<?php
/**
 * 
 */
class Index extends Dcontroller{
	
	
	public function __construct(){
		parent::__construct();
	}
	public function Index(){
		$this->home();
	}
	public function home(){
		$data = array();
		$tableNameCat = "category";
		$tableNamePost = "post";
		$this->load->view("header");
		
		$CatModel = $this->load->model("CatModel");
		$data['catlist_Parameter'] = $CatModel->catList($tableNameCat );
		$this->load->view("search", $data);
		
		$PostModel = $this->load->model("PostModel");
		$data['allPost'] = $PostModel->getallPost($tableNamePost );
		$this->load->view("content", $data);
	   
		
		$data['letestPost'] = $PostModel->getLetestPost($tableNamePost );
		$this->load->view("sidebar", $data);

		$this->load->view("footer");	
	}
	public function postDetails($id=null){
	    $data = array();
		$tableNamePost = "post";
		$tableNameCat = "category";
		$this->load->view("header");

		$CatModel = $this->load->model("CatModel");
		$data['catlist_Parameter'] = $CatModel->catList($tableNameCat );
		$this->load->view("search", $data);

		

		$PostModel = $this->load->model("PostModel");
		$data['postById'] = $PostModel->getallPostById($tableNamePost, $tableNameCat, $id);
		$this->load->view("details", $data);
		
		$data['letestPost'] = $PostModel->getLetestPost($tableNamePost );
		$this->load->view("sidebar", $data);

		$this->load->view("footer");
		
	}
	public function postBycat($id=null){
	    $data = array();
		$tableNamePost = "post";
		$tableNameCat = "category";
		$this->load->view("header");

		$CatModel = $this->load->model("CatModel");
		$data['catlist_Parameter'] = $CatModel->catList($tableNameCat );
		$this->load->view("search", $data);

		$PostModel = $this->load->model("PostModel");
		$data['getCat'] = $PostModel->getallPostByCat($tableNamePost, $tableNameCat, $id);
		$this->load->view("postByCat", $data);
		
		
		$data['letestPost'] = $PostModel->getLetestPost($tableNamePost );
		$this->load->view("sidebar", $data);
		$this->load->view("footer");
		
	}
	public function search(){
		$data = array();
		$keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
		$cat     = isset($_REQUEST['cat']) ? $_REQUEST['cat'] : '';
		$tableNamePost = "post";
		$tableNameCat = "category";
		$this->load->view("header");

		$CatModel = $this->load->model("CatModel");
		$data['catlist_Parameter'] = $CatModel->catList($tableNameCat );
		$this->load->view("search", $data);

		$PostModel = $this->load->model("PostModel");
		$data['searchCat'] = $PostModel->searchPostByCat($tableNamePost, $keyword, $cat);
		$this->load->view("search_result", $data);
		
		
		$data['letestPost'] = $PostModel->getLetestPost($tableNamePost );
		$this->load->view("sidebar", $data);
		$this->load->view("footer");

	}

}
?>
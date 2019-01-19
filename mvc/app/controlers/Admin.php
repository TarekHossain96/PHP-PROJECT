<?php

class Admin extends Dcontroller{
	
	public function __construct()
	{
		parent::__construct();
		Session::chkSession();
	}
	public function Index(){
		$this->adminControler();
	}
	public function adminControler(){
		$this->load->view("header");
		$this->load->view('folder_Admin/sidebar');
		$this->load->view('folder_Admin/home');
		$this->load->view("footer");
	}
	public function addCategory(){
		$this->load->view("header");
		$this->load->view('folder_Admin/sidebar');
		$this->load->view('folder_Admin/addCategory');
		$this->load->view("footer");
	}
	public function inserCategory(){
		$tableName = "category";
        $name = (isset($_POST['name']) ? $_POST['name'] : '');
		$title = (isset($_POST['title']) ? $_POST['title'] : '');
		
		$data = array( 

               'name'  => $name,
               'title' => $title
		);
      

		$CatModel = $this->load->model("CatModel");
		$result = $CatModel->insertCat($tableName, $data);

		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Data exported successfully.";
		} else {
			$mdata['msg'] = "Error exporting data.";
		}
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location: $url");
		
	}
	public function categoryList(){
		$this->load->view("header");
		$this->load->view('folder_Admin/sidebar');

		$data = array();
		$tableName = "category";
		$CatModel = $this->load->model("CatModel");
		$data['cat'] = $CatModel->catList($tableName );
		$this->load->view("folder_Admin/categoryList", $data);
		$this->load->view("footer");
	}
	public function editCategory($id=null){
		$this->load->view("header");
		$this->load->view('folder_Admin/sidebar');

		$data = array();
		$tableName = "category";
		$CatModel = $this->load->model("CatModel");
		$data['catbyId'] = $CatModel->catByid($tableName, $id);
        $this->load->view("folder_Admin/updateCategory", $data);
        
        $this->load->view("footer");
		
	}
	public function updateCat($id){
		$tableName = "category";
		
		$name = (isset($_POST['name']) ? $_POST['name'] : '');
		$title = (isset($_POST['title']) ? $_POST['title'] : '');
		$cond = "id=$id ";
		
		$data = array( 

               'name'  => $name,
               'title' => $title
		);
		$CatModel = $this->load->model("CatModel");
		$result = $CatModel->catUpdate($tableName, $data, $cond);
		$mdata = array();

		if ($result == 1) {
			$mdata['msg'] = "Data updated successfully.";
		} else {
			$mdata['msg'] = "Data not updated.";
		}
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location: $url");
        
	}
	public function deleteCatById($id=Null){
		$tableName = "category";
		$cond = "id=$id";
		$CatModel = $this->load->model("CatModel");
		$result = $CatModel->catDelete($tableName, $cond);

		$mdata = array();

		if ($result == 1) {
			$mdata['msg'] = "Data deleted successfully.";
		} else {
			$mdata['msg'] = "Data not deleted.";
		}
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location: $url");    
	}
	public function addArticle(){
		$data = array();
		$tableNameCat = "category";
		$this->load->view("header");
		$this->load->view('folder_Admin/sidebar');

		$CatModel = $this->load->model("CatModel");
		$data['catlist'] = $CatModel->catList($tableNameCat );
		$this->load->view('folder_Admin/addPost',$data);
		$this->load->view("footer");
	}
	public function articleList(){
		$tableNameCat = "category";
		$tableNamePost = "post";
		$this->load->view("header");
		$this->load->view('folder_Admin/sidebar');

		$PostModel = $this->load->model("PostModel");
		$data['listPost'] = $PostModel->getPostList($tableNamePost );

		$CatModel = $this->load->model("CatModel");
		$data['catlist'] = $CatModel->catList($tableNameCat );
		$this->load->view('folder_Admin/postlist', $data);
		$this->load->view("footer");

	}
	public function addNewPost(){
		if (!$_POST['submit']) {
			header("Location:".BASE_URL."/Admin/");
		}else{
		$tableNamePost = "post";
		$title         = (isset($_POST['title']) ? $_POST['title'] : '');
		$content       = (isset($_POST['content']) ? $_POST['content'] : '');
		$cat           = (isset($_POST['cat']) ? $_POST['cat'] : '');

		
		$data = array( 

               'title'   => $title,
               'content' => $content,
               'cat'     => $cat
		);
      

		$PostModel = $this->load->model("PostModel");
		$result = $PostModel->insertPost($tableNamePost, $data);
		$mdata = array();

		if ($result == 1) {
			$mdata['msg'] = "Article added successfully.";
		} else {
			$mdata['msg'] = "Article not added.";
		}
		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}
	}
}
?>
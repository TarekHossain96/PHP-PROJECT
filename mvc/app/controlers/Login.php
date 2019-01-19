<?php
/**
 * 
 */
class Login extends Dcontroller{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function Index(){
		Session::init();
		if (Session::get("login") == true) {
			header("Location:".BASE_URL."/Admin");
		}
		$this->login();
	}
	public function login(){
		$this->load->view("header");
		$this->load->view("folder_Login/login");
		$this->load->view("footer");
	}
	public function login_authentication(){
		$admin_Table = 'tbl_user';
		$username    = $_POST['username'];
		$password    = md5($_POST['password']);
		$LoginModel  = $this->load->model("LoginModel");
		$count       = $LoginModel->userControl($admin_Table,$username,$password );
		if ($count>0) {
			$result  = $LoginModel->getUserData($admin_Table,$username,$password );
			Session::init();
			Session::set("login", true);
			Session::set("username", $result[0]['username']);
			Session::set("userId",$result[0]['id']);
            
            header("Location:".BASE_URL."/Admin");
		}else{
			header("Location:".BASE_URL."/Login");
		}
	}
	public function logout(){
		Session::init();
		Session::destroy();
		header("Location:".BASE_URL."/Login");
	}
	
}
?>
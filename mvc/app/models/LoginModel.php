
<?php
class LoginModel extends DModel{
	
	public function __construct(){
		parent::__construct();
	}
	public function userControl($admin_Table,$username,$password){
		$sql ="SELECT * FROM tbl_user WHERE username=? AND password=?";
		return $this->db->affectedRows($sql,$username,$password);
	}
	public function getUserData($admin_Table,$username,$password){
		$sql ="SELECT * FROM tbl_user WHERE username=? AND password=?";
		return $this->db->selectUser($sql,$username,$password);
	}
}
?>
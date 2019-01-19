<?php

class main{
	public $url;
	public $controler_name = "Index";
	public $method_name = "Index";
	public $controler_path = "app/controlers/"  ;
	public $controler;
	public function __construct(){
		$this->get_url();
		$this->load_controler();
		$this->call_method();
	}
	public function get_url(){
		$this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
		if ($this->url != NULL) {
			$this->url = rtrim($this->url,'/'); 
		    $this->url = explode("/", filter_var($this->url,FILTER_SANITIZE_URL));
		    
		} else {
			unset($this->url);
		}
	}
	public function load_controler(){
		if (!isset($this->url[0])) {
			include $this->controler_path.$this->controler_name.".php";
			$this->controler = new $this->controler_name();
		}else{
			$this->controler_name = $this->url[0];
			$file_path = $this->controler_path.$this->controler_name.".php";
			if (file_exists($file_path)) {
				include $file_path;
				if (class_exists($this->controler_name)) {
					$this->controler = new $this->controler_name();
				}else{
                     header("Location:".BASE_URL."/Index");
				}
			}else{
                header("Location:".BASE_URL."/Index");
			}
		}
	}
	public function call_method(){
		if (isset($this->url[2])) {
			$this->method_name = $this->url[1];
			if (method_exists($this->controler, $this->method_name)) {
				$this->controler->{$this->method_name}($this->url[2]);
			}else{
				header("Location:".BASE_URL."/Index");
			}
	}else{
		if (isset($this->url[1])) {
			$this->method_name = $this->url[1];
			if (method_exists($this->controler, $this->method_name)) {
				$this->controler->{$this->method_name}();
			}else{
				header("Location:".BASE_URL."/Index");
			}

	}else{
		if (method_exists($this->controler, $this->method_name)) {
				$this->controler->{$this->method_name}();
			}else{
				header("Location:".BASE_URL."/Index");
			}
	}
	
}
}
}
?>
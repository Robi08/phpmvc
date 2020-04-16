<?php 

class App {

	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct(){
		$url = $this->parseUrl();

		// Controller
		if(file_exists('../app/controllers/'. $url[0] . '.php')){
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		// method
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// params
		if( !empty($url)) {
			$this->params = array_values($url);
		}

		// jalankan controller method serta kirimkan params jika ada
			// untuk menjalankan controller method dan param
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseUrl(){
		if(isset($_GET['url'])){
			// rtrim untuk menghapus tanda diakhir
			$url = rtrim($_GET['url'], '/');
			// untuk membersihkan url dari string aneh agar aman
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url); 
			return $url;
		}
	}
}
<?php
/**
* Controller
*/
class Controller 
{
	var $controller;
	var $action;
	var $params;
	var $views_dir;
	var $data;
	var $dbContext;	
	var $layout;

	function __construct($options=array('','',[]))
	{
		$this->controller   = strtolower(str_replace("Controller", "",$options[0]));
		$this->action  		= strtolower($options[1]);
		$this->params  		= $options[2];
		$this->dbContext 	= new DBContext("tickets.db");
		$this->layout       = 'default_layout';
	}
	function root_url(){

		return 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['HTTP_HOST'].'/'.ROOT_DIR;
	}
	function load_view($file_name = ""){
		$this->data['controller'] = $this->controller;
		$this->data['action']     = $this->action;
		$this->data['params']     = $this->params;
		if(empty($file_name)){
			$file_name = $this->views_dir.'/'.$this->controller."/".$this->action;
		}
		$layout = "views/_partials/".$this->layout.".php";
		$file_name = $file_name.".php";
		if(!file_exists($file_name)){
			echo "<pre>$file_name do not exist. Please make sure the file is there.</pre>";
		}
		ob_start();
		include $layout;
		$layout = ob_get_clean();
		ob_start();
		include $file_name;
		$view   = ob_get_clean();
		echo str_replace("{{body}}", $view, $layout);

	}
	function load_partial($file_name = ""){
		include $file_name.'.php';		
	}
	function render($view_file){
		
	}
}
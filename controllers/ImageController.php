<?php

/**
* imageController
*/
class ImageController extends Controller
{
	var $image_model;
	function __construct()
	{
		parent::__construct(func_get_args());
		$this->views_dir   = "views";
		$this->layout 	   = "sidebar_layout";
		$this->image_model = $this->load_model("ImageModel");
	}
	function index($id = 0)
	{
		if($id != 0){
			$this->show($id);
			return;
		}
		$this->data['data'] = $this->image_model->get_many();
		$this->load_view();
	}
	function delete($id=0){
		$this->image_model->delete($id);
		$this->redirect($this->root_url('/image'));
	}
	function create(){
		if(isset($_POST['title'])){
			$this->save();
			return;
		}
		$this->load_view();
	}
	
	function edit($id=0){
		if(isset($_POST['id'])){
			$this->save();
			return;
		}
		$this->data['form'] = $this->image_model->get($id);
		$this->load_view("views/image/edit");
	}
	function save(){
		$requestType = isset($_POST['requestType'])?$_POST['requestType']:"";
		if(!empty($requestType)){
			unset($_POST['requestType']);
		}
		$id = isset($_POST['id'])?$_POST['id']:-1;
		if($id == -1){
			$this->image_model->insert($_POST);
		}
		else{
			unset($_POST['id']);
			$this->image_model->update($id,$_POST);
		}
		if($requestType == 'ajax'){
			echo json_encode(array("STATUS"=>'OK'));
			die();
		}
		else{
			$this->redirect($this->root_url('/image'));
		}
	}
	function show($id){
		$this->data['view_object'] = $this->image_model->get($id);
		$this->load_view("views/image/show");
	}
}
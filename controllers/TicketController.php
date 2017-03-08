<?php

/**
* TicketController
*/
class TicketController extends Controller
{
	var $ticket_model;
	function __construct()
	{
		parent::__construct(func_get_args());
		$this->views_dir = "views";
		$this->layout = "sidebar_layout";
		$this->ticket_model = new TicketModel($this->dbContext);
	}
	function index($id = 0)
	{
		if($id != 0){
			$this->show($id);
			return;
		}
		$this->data['data'] = $this->ticket_model->get_many();
		$this->load_view();
	}
	function delete($id=0){
		$this->ticket_model->delete($id);
		header("location: /home/ticket");
	}
	function create(){
		if(isset($_POST['title'])){
			$this->save();
			return;
		}
		$this->load_view();
	}
	function create_bulk(){
		$requestType = isset($_POST['requestType'])?$_POST['requestType']:"";
		if(isset($_POST['tickets'])){
			foreach ($_POST['tickets'] as $key => $ticket) {

				$this->ticket_model->insert($ticket);
			}
			if($requestType == 'ajax'){
			echo json_encode(array("STATUS"=>'OK'));
				die();
			}
			else{
				header("location: /home/ticket");
			}
		}
	}
	function edit($id=0){
		if(isset($_POST['id'])){
			$this->save();
			return;
		}
		$this->data['form'] = $this->ticket_model->get($id);
		$this->load_view("views/ticket/edit");
	}
	function save(){
		$requestType = isset($_POST['requestType'])?$_POST['requestType']:"";
		if(!empty($requestType)){
			unset($_POST['requestType']);
		}
		$id = isset($_POST['id'])?$_POST['id']:-1;
		if($id == -1){
			$this->ticket_model->insert($_POST);
		}
		else{
			unset($_POST['id']);
			$this->ticket_model->update($id,$_POST);
		}
		if($requestType == 'ajax'){
			echo json_encode(array("STATUS"=>'OK'));
			die();
		}
		else{
			header("location: /home/ticket");
		}
	}
	function show($id){
		$this->data['view_object'] = $this->ticket_model->get($id);
		$this->load_view("views/ticket/show");
	}
}

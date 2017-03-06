<?php

/**
* TicketController
*/
class IndexController extends Controller
{
	
	function __construct()
	{
		parent::__construct(func_get_args());
		$this->views_dir = "views";
	}
	function index()
	{
		$this->load_view("views/home/index");
	}
	
}

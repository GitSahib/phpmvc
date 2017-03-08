<?php
	/**
	* Ticket.php
	* Ticket model
	*/
	class ImageModel extends Model
	{
		var $id;
		var $title;
		var $image_files;
		function __construct($dbc)
		{
			$this->table_name = "Images";
			$this->pk         = 'id';
			parent::__construct($dbc);

		}
	}
	
 ?>
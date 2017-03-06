<?php
	/**
	* Ticket.php
	* Ticket model
	*/
	class TicketModel extends Model
	{
		var $id;
		var $title;
		var $icode_message;
		var $merge_message;
		var $branch_name;
		function __construct($dbc)
		{
			$this->table_name = "Tickets";
			$this->pk         = 'id';
			parent::__construct($dbc);

		}
	}
	
 ?>
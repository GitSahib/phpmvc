<?php
/**
 * SQLite3 class and changing the __construct
 * parameters, then using the open method to initialize the DB.
 */
class DBContext extends SQLite3
{
    function __construct($dbName)
    {
        $this->open($dbName);
        $query = "CREATE TABLE IF NOT EXISTS Tickets("
        		 . "id INTEGER PRIMARY KEY AUTOINCREMENT,"
        		 . "title varchar(100),"
        		 . "icode_message varchar(200),"
        		 . "merge_message varchar(200),"
        		 . "branch_name varchar(50))";
        $this->exec($query);
        $query = "CREATE TABLE IF NOT EXISTS Images("
                 . "id INTEGER PRIMARY KEY AUTOINCREMENT,"
                 . "title varchar(100),"
                 . "file_name varchar(200))";
        $this->exec($query);
    }
    function getError(){
    	return $this->lastErrorMsg();
    }
}
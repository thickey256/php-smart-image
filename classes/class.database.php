<?php

	class site_database
	{
		private $database_host;
		private $database_name;
		private $database_user;
		private $database_password;

		//creates a new database connection
		function __construct()
		{
			$this->database_host		= $GLOBALS['db_conf']['host'];
			$this->database_name		= $GLOBALS['db_conf']['database_name'];
			$this->database_user		= $GLOBALS['db_conf']['database_user'];
			$this->database_password	= $GLOBALS['db_conf']['database_password'];

			$GLOBALS['database'] = new PDO('mysql:host='.$this->database_host.';dbname='.$this->database_name, $this->database_user, $this->database_password, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
			$GLOBALS['database']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
?>

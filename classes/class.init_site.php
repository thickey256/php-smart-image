<?php

class site
{
	function __construct()
	{
		//General global variables
		$GLOBALS['site_name']			= "PHP Smart Image";
		$GLOBALS['root_path']			= $_SERVER["FILE_ROOT"];
		$GLOBALS['class_path']			= $_SERVER["FILE_ROOT"].'classes/';
		$GLOBALS['soruce_image_path']	= $_SERVER["FILE_ROOT"].'image_source/';
		$GLOBALS['dest_image_path']		= $_SERVER["FILE_ROOT"].'htdocs/images/';

		//Database config for me is set via enviroment variables
		$GLOBALS['db_conf']['host']					= $_SERVER["DBHOST"];
		$GLOBALS['db_conf']['database_name']		= $_SERVER["DBDATABASE"];
		$GLOBALS['db_conf']['database_user']		= $_SERVER["DBUSER"];
		$GLOBALS['db_conf']['database_password']	= $_SERVER["DBPASS"];

		//database config
		require($GLOBALS['class_path'].'class.database.php');
		$database = new site_database();
	}
}
	
?>

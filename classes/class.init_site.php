<?php

class site
{
	function __construct()
	{
		//General global variables
		$GLOBALS['site_name']			= "PHP Smart Image";
		$GLOBALS['root_path']			= $_SERVER["FILE_ROOT"];
		$GLOBALS['class_path']			= $_SERVER["FILE_ROOT"].'classes/';
		$GLOBALS['soruce_image_path']	= $_SERVER["FILE_ROOT"].'source-images/';
		$GLOBALS['dest_image_path']		= $_SERVER["FILE_ROOT"].'htdocs/images/';

		//Image variabled
		$GLOBALS['image_max_size']		= 2000;
		$GLOBALS['image_highdpi_size']	= 2; //the multiplier for the retina image

		$GLOBALS['image_compression']	= 60; //you may want to finesse this setting to suit
		$GLOBALS['highdpi_compression']	= 30; //same as above, but you should be able to get away with more compression
		$GLOBALS['highdpi_addition'] 	= '@2x'; //what to add to the filename at the end to signify a highdpi image


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

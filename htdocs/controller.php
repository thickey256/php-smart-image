<?php

if(! isset($GLOBALS['site_name']))
{
	require($_SERVER["FILE_ROOT"].'classes/class.init_site.php');
	$site = new site();
}

	require($GLOBALS['class_path'].'class.search_image.php');
	require($GLOBALS['class_path'].'class.resize_image.php');

/*
	ok so this is where we end up if we get a 404 error.
	so we need to take a look at the error url and see if
	we can match that up to a file on our database
*/

	//search for the image first
	$source_image = new search_image($_SERVER["REDIRECT_URL"]);

	if ($source_image->image_found != 1)
	{
		//we throw a normal 404 error as we can't find the image.
		header("HTTP/1.0 404 Not Found");
	}
	else
	{
		//ok so we have an image we need to resize it first
		$new_image = new resize_image($source_image);
	}
?>

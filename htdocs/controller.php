<?php

//phpinfo(35);

if(! isset($GLOBALS['site_name']))
{
	require($_SERVER["FILE_ROOT"].'classes/class.init_site.php');
	$site = new site();
}

/*
	ok so this is where we end up if we get a 404 error.
	so we need to take a look at the error url and see if
	we can match that up to a file on our database

	This is very much a proof of concept, you could just
	search the filesystem for the image but I am assuming
	that you are not in fact just throwing a load of images
	into a single directory and there is some further organisation
	in place for the images.  If not things will get confusing quickly!
*/

//butcher up the URL to see if it's one of our images or not.
$requested_image = explode('/',$_SERVER["REDIRECT_URL"]);

//so we currently don't care about the much of the url at this point
//we just want the end url part.
$temp_array = array_reverse($requested_image);
$requst_filename = array_shift($temp_array);

//great we have our filename, now to search the database
$sql = "select
			source_images.source_filename
		from
			source_images
		where
			source_images.source_filename = :requst_filename
		limit 1";

$sql = $GLOBALS['database']->prepare($sql);
$sql->bindValue(':requst_filename', $requst_filename, PDO::PARAM_STR);
$sql->execute();

$image_data = $sql->fetch(PDO::FETCH_ASSOC);

print_r($image_data);

//phpinfo(35);

?>

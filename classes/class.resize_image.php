<?php

	class resize_image
	{

		function __construct($resize_image)
		{
			//not sure I need to do anythign here
			$this->resize_image($resize_image);
		}

		function resize_image($resize_image)
		{
			//lets put a max resolution limit on the images.
			if ($size > $GLOBALS['image_max_size'])
			{
				$size = $GLOBALS['image_max_size'];
			}

			$hidpi_size = $size * $GLOBALS['image_highdpi_size'];

			//create a new image
			$image = new Imagick();

			//read the source image in
			$image_handle = fopen($GLOBALS['soruce_image_path'].$resize_image->image_info['source'], 'rb');
			$image->readImageFile($image_handle);

			//changes image to 72dpi
			$image->setImageResolution(72,72);

			//strips meta data that photoshop loves to throw in
			$image->stripImage();

			//sorts out the image compression
			$image->setImageCompressionQuality($GLOBALS['image_compression']);

			//resize the image to the correct size
			$image->resizeImage($resize_image->image_info['size'],0,Imagick::FILTER_CATROM,1);

			//output the image to the browser
			$output = $image->getimageblob();
			$outputtype = $image->getFormat();
			header("Content-type: $outputtype");
			echo $output;

			//ok this is only half the battle.. as we want to cache the image for next time
			//so we don't constantly generate image unnecessarily.
			$image_destination = $GLOBALS['dest_image_path'].$resize_image->image_info['size'];

			//does the size directory exist?
			if (!is_dir($image_destination))
			{
				mkdir($image_destination);
			}

			//does the category directory exist?
			$image_destination .= '/'.$resize_image->image_info['category'];
			if (!is_dir($image_destination))
			{
				mkdir($image_destination);
			}

			//and does the sub_category directory exist?
			$image_destination .= '/'.$resize_image->image_info['sub_category'];
			if (!is_dir($image_destination))
			{
				mkdir($image_destination);
			}

			//lastly does the product directory exist?
			$image_destination .= '/'.$resize_image->image_info['product_title'];

			if (!is_dir($image_destination))
			{
				mkdir($image_destination);
			}

			$image->writeImage($image_destination.'/'.$resize_image->image_info['filename']);

			//and now we need to do the same thing again but with the highdip version!
			$image_highdpi = new Imagick();

			//read the source image in
			$image_highdpi->readImageFile($image_handle);

			//changes image to 72dpi
			$image_highdpi->setImageResolution(72,72);

			//strips meta data that photoshop loves to throw in
			$image_highdpi->stripImage();

			//sorts out the image compression
			$image_highdpi->setImageCompressionQuality($GLOBALS['highdpi_compression']);

			//resize to max imagesize
			$image_highdpi->resizeImage($resize_image->image_info['size'] * $GLOBALS['image_highdpi_size'],0,Imagick::FILTER_CATROM,1);

			//add the extra highdpi bit to the filename at the end.
			//this may be a stupid way to do this..
			$highdpi_filename = str_replace('.',$GLOBALS['highdpi_addition'].'.', $resize_image->image_info['filename']);


			$image_highdpi->writeImage($image_destination.'/'.$highdpi_filename);

			fclose($image_handle);
		}
	}
?>

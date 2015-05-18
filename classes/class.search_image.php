<?php

	class search_image
	{
		private $search_url;
		public $image_found = false;
		public $image_info;

		//searching the system for an image based on a url
		function __construct($search_url)
		{
			$this->search_url = $search_url;
			$this->search_image();
		}

		function search_image()
		{
			//chop up the URL to see if it's one of our images or not.
			$requested_image = explode('/',$this->search_url);

			//so we currently don't care about the much of the url at this point
			//we just want the end url part.
			$temp_array = array_reverse($requested_image);
			$requst_filename = array_shift($temp_array);

			//remove highdpi element.
			$requst_filename = str_replace($GLOBALS['highdpi_addition'],'',$requst_filename);

			//great we have our filename, now to search the database
			$sql = "select
						source_images.image_id,
						source_images.source_filename,
						products.image_source_path,
						products.product_title,
						products.product_category,
						products.product_sub_category
					from
						source_images,
						products
					where
							source_images.source_filename = :requst_filename
						and	source_images.product_id = products.product_id
					limit 1";

			$sql = $GLOBALS['database']->prepare($sql);
			$sql->bindValue(':requst_filename', $requst_filename, PDO::PARAM_STR);
			$sql->execute();

			$image_data = $sql->fetch(PDO::FETCH_ASSOC);

			if ($image_data['image_id'] > 0)
			{
				//we need to find the desired size of the image.
				//this seems the most logical way to approach this.
				$this->image_info['size'] = 0;
				$count = 0;

				while (($count < count($requested_image)) && ($this->image_info['size'] == 0))
				{
					//the first number only item in the address we take as the image size.
					if (is_numeric($requested_image[$count]))
					{
						$this->image_info['size'] = $requested_image[$count];
					}
					$count ++;
				}

				//if there is no size found.. lets guess.. better than not showing any image?
				if ($this->image_info['size'] == 0)
				{
					$this->image_info['size'] = 500;
				}

				$this->image_info['source'] 		= $image_data['image_source_path'].$image_data['source_filename'];
				$this->image_info['product_title']	= trim(strtolower(str_replace(' ','-',$image_data['product_title'])));
				$this->image_info['category']		= trim(strtolower(str_replace(' ','-',$image_data['product_category'])));
				$this->image_info['sub_category']	= trim(strtolower(str_replace(' ','-',$image_data['product_sub_category'])));
				$this->image_info['filename']		= $requst_filename;
				$this->image_found = true;
			}
		}
	}
?>

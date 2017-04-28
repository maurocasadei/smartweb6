<?php
	if (isset($_FILES)){
		############ immagine ##############
		$config["generate_image_file"]			= true;
		$config["generate_thumbnails"]			= true;
		$config["image_big_size_width"] 			= $image_big_size_width; //Maximum image size (height and width)
		$config["image_big_size_height"] 			= $image_big_size_height; //Maximum image size (height and width)
		$config["image_medium_size_width"] 			= $image_medium_size_width; //Maximum image size (height and width)
		$config["image_medium_size_height"] 			= $image_medium_size_height; //Maximum image size (height and width)
		$config["thumbnail_crop1_size_width"]  			= $thumbnail_crop1_size_width; //Thumbnails will be cropped to 200x200 pixels
		$config["thumbnail_crop1_size_height"]  			= $thumbnail_crop1_size_height; //Thumbnails will be cropped to 200x200 pixels
		$config["thumbnail_crop2_size_width"]  			= $thumbnail_crop2_size_width; //Thumbnails will be cropped to 200x200 pixels
		$config["thumbnail_crop2_size_height"]  			= $thumbnail_crop2_size_height; //Thumbnails will be cropped to 200x200 pixels
		$config["thumbnail_prefix"]			= ""; //Normal thumb Prefix
		$config["image_big_destination_folder"]			= "../".$image_big_destination_folder; //upload directory ends with / (slash)
		$config["image_medium_destination_folder"]			= "../".$image_medium_destination_folder; //upload directory ends with / (slash)
		$config["thumbnail_crop1_destination_folder"]		= "../".$thumbnail_crop1_destination_folder; //upload directory ends with / (slash)
		$config["thumbnail_crop2_destination_folder"]		= "../".$thumbnail_crop2_destination_folder; //upload directory ends with / (slash)
		$config["upload_url"] 				= "../".$thumbnail_crop1_destination_folder;
		$config["quality"] 				= 90; //jpeg quality
		$config["random_file_name"]			= false; //randomize each file name
		//specify uploaded file variable
		$config["file_data"] = $_FILES[$POST_file_name];
		include_once("general/resize.class.php");
		$im = new ImageResize($config);
		try{
			$responses = $im->resize(); //initiate image resize
			foreach($responses["thumbs"] as $response){
				$immaginesrc=$config["upload_url"].$response;
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
		$immaginesrc=str_replace("../","",$immaginesrc);
		############ immagine ##############
	}

?>

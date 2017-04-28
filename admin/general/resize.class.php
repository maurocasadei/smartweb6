<?php
/*
Copyright (c) <2016> <http://www.sanwebe.com>
License : http://opensource.org/licenses/MIT
*/
class ImageResize {
	private $generate_image_file;
	private $generate_thumbnails;
	private $image_big_size_width;
	private $image_big_size_height;
	private $image_medium_size_width;
	private $image_medium_size_height;
	private $thumbnail_crop1_size_width;
	private $thumbnail_crop1_size_height;
	private $thumbnail_crop2_size_width;
	private $thumbnail_crop2_size_height;
	private $thumbnail_prefix;
	private $image_big_destination_folder;
	private $image_medium_destination_folder;
	private $thumbnail_crop1_destination_dir;
	private $thumbnail_crop2_destination_dir;
	private $save_dir;
	private $quality;
	private $random_file_name;
	private $config;
	private $file_count;
	private $image_width;
	private $image_height;
	private $image_type;
	private $image_size_info;
	private $image_res;
	private $image_scale;
	private $new_width;
	private $new_height;
	private $adjusted_width;
	private $adjusted_height;
	private $new_canvas;
	private $new_file_name;
	private $curr_tmp_name;
	private $x_offset;
	private $y_offset;
	private $resized_response;
	private $thumb_response;
	private $unique_rnd_name;
	public $response;

	function __construct($config) {
			//set local vars
			$this->generate_image_file = $config["generate_image_file"];
			$this->generate_thumbnails = $config["generate_thumbnails"];
			$this->image_big_size_width = $config["image_big_size_width"];
			$this->image_big_size_height = $config["image_big_size_height"];
			$this->image_medium_size_width = $config["image_medium_size_width"];
			$this->image_medium_size_height = $config["image_medium_size_height"];
			$this->thumbnail_crop1_size_width = $config["thumbnail_crop1_size_width"];
			$this->thumbnail_crop1_size_height = $config["thumbnail_crop1_size_height"];
			$this->thumbnail_crop2_size_width = $config["thumbnail_crop2_size_width"];
			$this->thumbnail_crop2_size_height = $config["thumbnail_crop2_size_height"];
			$this->thumbnail_prefix = $config["thumbnail_prefix"];
			$this->destination_big_dir = $config["image_big_destination_folder"];
			$this->destination_medium_dir = $config["image_medium_destination_folder"];
			$this->thumbnail_crop1_destination_dir = $config["thumbnail_crop1_destination_folder"];
			$this->thumbnail_crop2_destination_dir = $config["thumbnail_crop2_destination_folder"];
			$this->random_file_name = $config["random_file_name"];
			$this->quality = $config["quality"];
			$this->file_data = $config["file_data"];
			$this->file_count = count($this->file_data['name']);
	}

	//resize function
	public function resize(){
		if($this->generate_image_file){
			$this->response["images"] = $this->resize_big();
		}
		if($this->generate_image_file){
			$this->response["images"] = $this->resize_medium();
		}
		if($this->generate_thumbnails){
			$this->response["thumbs"] = $this->thumbnail_crop(1);
		}
		if($this->generate_thumbnails){
			$this->response["thumbs"] = $this->thumbnail_crop(2);
		}
    error_log(serialize($this->response));
		return $this->response;
	}
	//proportionally resize image
	private function resize_big(){
	//var_dump($this->file_data);
		if($this->file_count > 0){
			for ($x = 0; $x < $this->file_count; $x++){

				if ($this->file_data['error'] > 0) {
					$this->upload_error_no = $this->file_data['error'];
					throw new Exception($this->get_upload_error());
				}

				if(is_uploaded_file($this->file_data['tmp_name'])){
					$this->curr_tmp_name = $this->file_data['tmp_name'];
					$this->get_image_info();

					//create unique file name
					if($this->random_file_name){
						$this->new_file_name = uniqid().$this->get_extension();
						$this->unique_rnd_name = $this->new_file_name;
					}else{
						$this->new_file_name = $this->file_data['name'];
					}
					$this->curr_tmp_name = $this->file_data['tmp_name'];
					$this->image_res = $this->get_image_resource();
					$this->save_dir = $this->destination_big_dir;
					//do not resize if image is smaller than max size
					if($this->image_width <= $this->image_big_size_width || $this->image_height <= $this->image_big_size_height){
						$this->new_width	= $this->image_width;
						$this->new_height	=  $this->image_height;
						if($this->image_resampling()){
							$this->resized_response[] = $this->save_image();
						}
					}else{
						$this->image_scale	= min($this->image_big_size_width/$this->image_width, $this->image_big_size_height/$this->image_height);
						$this->new_width	= ceil($this->image_scale * $this->image_width);
						$this->new_height	= ceil($this->image_scale * $this->image_height);

						if($this->image_resampling()){
							$this->resized_response[] = $this->save_image();
						}
					}
					imagedestroy($this->image_res);
				}else{
					print "not upload";
				}
			}
		}
		return $this->resized_response;
	}
	private function resize_medium(){
	//var_dump($this->file_data);
		if($this->file_count > 0){
			for ($x = 0; $x < $this->file_count; $x++){

				if ($this->file_data['error'] > 0) {
					$this->upload_error_no = $this->file_data['error'];
					throw new Exception($this->get_upload_error());
				}

				if(is_uploaded_file($this->file_data['tmp_name'])){
					$this->curr_tmp_name = $this->file_data['tmp_name'];
					$this->get_image_info();

					//create unique file name
					if($this->random_file_name){
						$this->new_file_name = uniqid().$this->get_extension();
						$this->unique_rnd_name = $this->new_file_name;
					}else{
						$this->new_file_name = $this->file_data['name'];
					}
					$this->curr_tmp_name = $this->file_data['tmp_name'];
					$this->image_res = $this->get_image_resource();
					$this->save_dir = $this->destination_medium_dir;
					//do not resize if image is smaller than max size
					if($this->image_width <= $this->image_medium_size_width || $this->image_height <= $this->image_medium_size_height){
						$this->new_width	= $this->image_width;
						$this->new_height	=  $this->image_height;
						if($this->image_resampling()){
							$this->resized_response[] = $this->save_image();
						}
					}else{
						$this->image_scale	= min($this->image_medium_size_width/$this->image_width, $this->image_medium_size_height/$this->image_height);
						$this->new_width	= ceil($this->image_scale * $this->image_width);
						$this->new_height	= ceil($this->image_scale * $this->image_height);

						if($this->image_resampling()){
							$this->resized_response[] = $this->save_image();
						}
					}
					imagedestroy($this->image_res);
				}else{
					print "not upload";
				}
			}
		}
		return $this->resized_response;
	}

	//generate cropped and resized thumbnails
	private function thumbnail_crop($ncrop=1){
		if($this->file_count > 0){
//			if(!is_array($this->file_data['name'])){
//				throw new Exception('HTML file input field must be in array format!');
//			}
			for ($x = 0; $x < $this->file_count; $x++){

				if ($this->file_data['error'] > 0) {
					$this->upload_error_no = $this->file_data['error'];
					throw new Exception($this->get_upload_error());
				}

				if(is_uploaded_file($this->file_data['tmp_name'])){
					$this->curr_tmp_name = $this->file_data['tmp_name'];
					$this->get_image_info();

					if($this->random_file_name && !empty($this->unique_rnd_name)){
						$this->new_file_name = $this->thumbnail_prefix.$this->unique_rnd_name;
					}else if($this->random_file_name){
						$this->new_file_name = $this->thumbnail_prefix.uniqid().$this->get_extension();
					}else{
						$this->new_file_name = $this->thumbnail_prefix.$this->file_data['name'];
					}

					$this->image_res = $this->get_image_resource();
          if ($ncrop==1){
  					$this->new_width = $this->thumbnail_crop1_size_width;
  					$this->new_height = $this->thumbnail_crop1_size_height;
  					$this->save_dir = $this->thumbnail_crop1_destination_dir;
          }else{
  					$this->new_width = $this->thumbnail_crop2_size_width;
  					$this->new_height = $this->thumbnail_crop2_size_height;
  					$this->save_dir = $this->thumbnail_crop2_destination_dir;
          }
					
          $this->y_offset = 0; $this->x_offset = 0;



          $wm = $this->image_width/$this->new_width;
          $hm = $this->image_height/$this->new_height;
          
          $h_height = $this->new_height/2;
          $w_height = 	$this->new_width/2;
          $coeff=$this->image_width/$this->image_height;
          $this->y_offset = 0; $this->x_offset = 0;
          if($this->image_width>= $this->image_height && $coeff>=1.0) {
             $this->adjusted_width = $this->image_width / $hm;
             $this->adjusted_height = $this->new_height;
              //se l'adjusted width non basta lo devo ricalcolare
             if ($this->adjusted_width<$this->new_width){
                $this->adjusted_width=$this->new_width;
                $this->adjusted_height=$this->adjusted_width*$this->image_height/$this->image_width;
             }
             $half_width = $this->adjusted_width / 2;  
             $int_width = $half_width - $w_height;
             $this->x_offset = -$int_width;
             $this->y_offset = 0;
             //imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
           //  error_log("hm:$hm nw:{$this->adjusted_width} nh:{$this->adjusted_height} w:$this->image_width h:$this->image_height");  die;
          } elseif(($this->image_width <$this->image_height) || ($this->image_width == $this->image_height)) {
          
             $this->adjusted_width = $this->new_width;
             $this->adjusted_height = $this->image_height / $wm;
             if ($this->adjusted_height<$this->new_height){
                $this->adjusted_height=$this->new_height;
                $this->adjusted_width=$this->adjusted_height*$this->image_width/$this->image_height;
             } //se l'adjusted width non basta lo devo ricalcolare
             $half_height = $this->adjusted_height / 2;
             $int_height = $half_height - $h_height;
             $this->y_offset = -$int_height;
             $this->x_offset = 0;
             //imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
           //  error_log("hm:$hm nw:{$this->adjusted_width} nh:{$this->adjusted_height} w:$this->image_width h:$this->image_height");  die;
          
          } else {
             $this->y_offset = 0; $this->x_offset = 0;
          }

					if($this->image_resampling_crop()){
						$this->thumb_response[] = $this->save_image();
					}
					imagedestroy($this->image_res);
				}
			}
		}
		return $this->thumb_response;
	}

	//save image to destination
	private function save_image(){
		if(!file_exists($this->save_dir)){ //try and create folder if none exist
			if(!mkdir($this->save_dir, 0755, true)){
				throw new Exception($this->save_dir . ' - directory doesn\'t exist!');
			}
		}

		switch($this->image_type){//determine mime type
			case 'image/png':
				imagepng($this->new_canvas, $this->save_dir.$this->new_file_name); imagedestroy($this->new_canvas); return $this->new_file_name;
				break;
			case 'image/gif':
				imagegif($this->new_canvas, $this->save_dir.$this->new_file_name); imagedestroy($this->new_canvas); return $this->new_file_name;
				break;
			case 'image/jpeg': case 'image/pjpeg':
				imagejpeg($this->new_canvas, $this->save_dir.$this->new_file_name, $this->quality); imagedestroy($this->new_canvas); return $this->new_file_name;
				break;
			default:
				imagedestroy($this->new_canvas);
				return false;
		}
	}

	//get image info
	private function get_image_info(){
		$this->image_size_info 	= getimagesize($this->curr_tmp_name);
		if($this->image_size_info){
			$this->image_width 		= $this->image_size_info[0]; //image width
			$this->image_height 	= $this->image_size_info[1]; //image height
			$this->image_type 		= $this->image_size_info['mime']; //image type
		}else{
			throw new Exception("Make sure Image file is valid image!");
		}
	}

	//image resample
	private function image_resampling(){
		$this->new_canvas	= imagecreatetruecolor($this->new_width, $this->new_height);
		if(imagecopyresampled($this->new_canvas, $this->image_res, 0, 0, $this->x_offset, $this->y_offset, $this->new_width, $this->new_height, $this->image_width, $this->image_height)){
			return true;
		}
	}
	private function image_resampling_crop(){
		$this->new_canvas	= imagecreatetruecolor($this->new_width, $this->new_height);
		error_log("xoff:".$this->x_offset."-"."yoff:". $this->y_offset."-"."newwidth:". $this->adjusted_width."-"."newheight:". $this->adjusted_height."-"."origwidth:". $this->image_width."-"."origheight:". $this->image_height);
    if(imagecopyresampled($this->new_canvas, $this->image_res,$this->x_offset, $this->y_offset, 0, 0, $this->adjusted_width, $this->adjusted_height, $this->image_width, $this->image_height)){
			return true;
		}
	}

	//create image resource
	private function get_image_resource(){
		switch($this->image_type){
			case 'image/png':
				return imagecreatefrompng($this->curr_tmp_name);
				break;
			case 'image/gif':
				return imagecreatefromgif($this->curr_tmp_name);
				break;
			case 'image/jpeg': case 'image/pjpeg':
				return imagecreatefromjpeg($this->curr_tmp_name);
				break;
			default:
				return false;
		}
	}

	private function get_extension(){
		   if(empty($this->image_type)) return false;
		   switch($this->image_type)
		   {
			   case 'image/gif': return '.gif';
			   case 'image/jpeg': return '.jpg';
			   case 'image/png': return '.png';
			   default: return false;
		   }
	   }

	private function get_upload_error(){
		switch($this->upload_error_no){
			case 1 : return 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
			case 2 : return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
			case 3 : return 'The uploaded file was only partially uploaded.';
			case 4 : return '';
			case 5 : return 'Missing a temporary folder. Introduced in PHP 5.0.3';
			case 6 : return 'Failed to write file to disk. Introduced in PHP 5.1.0';
		}
	}

}

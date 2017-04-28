<?php
  	//###################################  NO MULTILINGUA
    //preparo l'array data per i campi no multilingua
 		$data=array();
    error_log(serialize($_FILES));
    error_log(serialize($_POST));
		foreach ($arCampiNoMultilingua as $f) {
        switch ($f->Tipo){
            case "image":
                //immagine si multilingua
              if (isset($_FILES[$f->FieldDbName])){
              	$image_big_destination_folder=$f->Image_big_destination_folder;
              	$image_medium_destination_folder=$f->Image_medium_destination_folder;
              	$thumbnail_crop1_destination_folder=$f->Thumbnail_crop1_destination_folder;
              	$thumbnail_crop2_destination_folder=$f->Thumbnail_crop2_destination_folder;
              	$image_big_size_width=$f->Image_big_size_width;
              	$image_big_size_height=$f->Image_big_size_height;
              	$image_medium_size_width=$f->Image_medium_size_width;
              	$image_medium_size_height=$f->Image_medium_size_height;
              	$thumbnail_crop1_size_width=$f->Thumbnail_crop1_size_width;
              	$thumbnail_crop1_size_height=$f->Thumbnail_crop1_size_height;
              	$thumbnail_crop2_size_width=$f->Thumbnail_crop2_size_width;
              	$thumbnail_crop2_size_height=$f->Thumbnail_crop2_size_height;
              	$immaginesrc=$f->Immaginesrc;
              	$POST_file_name=$f->FieldDbName;  
              	include ("general/dettImage.inc.php");
              	if ($immaginesrc!=""){$data[$f->FieldDbName]=$immaginesrc;}
              }
            	if (isset($_POST["chkdelete-$f->FieldDbName"])){$data[$f->FieldDbName]="";}
              break;
            case "pdf":
              if (isset($_FILES[$f->FieldDbName])){
              	$folderpdf="";
              	include_once("general/uploadPdf.php");
              	$upload = Upload::factory("{$config["subfolder"]}/{$config["folderpdf"]}");
              	$upload->file($_FILES[$f->FieldDbName]);
              	$upload->set_filename($_FILES[$f->FieldDbName]["name"]);
              	$results = $upload->upload();
              	if ($results["status"]===true){
              		$data[$f->FieldDbName]=$config["folderpdf"]."/{$results["filename"]}";
              	}
            	}
          		if (isset($_POST["chkdelete-{$f->FieldDbName}"])){$data[$f->FieldDbName]="";}
            //	var_dump($results);die;
            	//fine pdf
              break;
            case "checkbox":
              if (isset($_POST[$f->FieldDbName])){
                $data[$f->FieldDbName]=($_POST[$f->FieldDbName]);
              }else{
                $data[$f->FieldDbName]=false;
              }
            case "checkboximage":
              //non faccio nulla è il checkbox di delete delle immagini
              break;
            default:
              if (isset($_POST[$f->FieldDbName])){
                $data[$f->FieldDbName]=($_POST[$f->FieldDbName]);
              }
            break;
        }
    }
    //fine preparo l'array data per i campi no multilingua
  	$db->setTrace(true);
  	$db->startTransaction();
  	if (in_update()){
  		$db->setTrace(true);
  		$db->where ($campoID, $_POST[$campoID]);
  		$db->update ($nometabella, $data);
  		$id=$_POST[$campoID];
  		error_log(serialize($db->trace));
  	}else{
  		$id = $db->insert ($nometabella, $data);
  	}
    //###################################  FINE NO MULTILINGUA

    //###################################  SI MULTILINGUA
	//inserisco o aggiorno i campi in multilingua
  if ($config["multilanguage"]){
  	foreach ($config["language"] as $key => $language){
  		$prefName="{$config["langseparator"]}{$key}{$config["langseparator"]}";
   		$data=array();
  		foreach ($arCampiSiMultilingua as $f) {
    		  $postName=$prefName.$f->FieldDbName;
          switch ($f->Tipo){
              case "image":
                  //immagine si multilingua
                if (isset($_FILES[$postName])){
                	$image_big_destination_folder=$f->Image_big_destination_folder;
                	$image_medium_destination_folder=$f->Image_medium_destination_folder;
                	$thumbnail_crop1_destination_folder=$f->Thumbnail_crop1_destination_folder;
                	$thumbnail_crop2_destination_folder=$f->Thumbnail_crop2_destination_folder;
                	$image_big_size_width=$f->Image_big_size_width;
                	$image_big_size_height=$f->Image_big_size_height;
                	$image_medium_size_width=$f->Image_medium_size_width;
                	$image_medium_size_height=$f->Image_medium_size_height;
                	$thumbnail_crop1_size_width=$f->Thumbnail_crop1_size_width;
                	$thumbnail_crop1_size_height=$f->Thumbnail_crop1_size_height;
                	$thumbnail_crop2_size_width=$f->Thumbnail_crop2_size_width;
                	$thumbnail_crop2_size_height=$f->Thumbnail_crop2_size_height;
                	$immaginesrc=$f->Immaginesrc;
                	$POST_file_name=$postName;  
                	include ("general/dettImage.inc.php");
                	if ($immaginesrc!=""){$data[$f->FieldDbName]=$immaginesrc;}
                }
              	if (isset($_POST[$prefName."chkdelete-$f->FieldDbName"])){$data[$f->FieldDbName]="";}
                break;
              case "pdf":
                if (isset($_FILES[$postName])){
                	$folderpdf="";
                	include_once("general/uploadPdf.php");
                	$upload = Upload::factory("{$config["subfolder"]}/{$config["folderpdf"]}");
                	$upload->file($_FILES[$postName]);
                	$upload->set_filename($_FILES[$postName]["name"]);
                	$results = $upload->upload();
                	if ($results["status"]===true){
                		$data[$f->FieldDbName]=$config["folderpdf"]."/{$results["filename"]}";
                	}
              	}
            		if (isset($_POST["{$prefName}chkdelete-{$f->FieldDbName}"])){$data[$f->FieldDbName]="";}
              //	var_dump($results);die;
              	//fine pdf
                break;
              case "checkboximage":
                //non faccio nulla è il checkbox di delete delle immagini
                break;
              default:
                if (isset($_POST[$postName])){
                  $data[$f->FieldDbName]=($_POST[$postName]);
                }
              break;
          }
      }
  		if ($db->getLastErrno() === 0){
      	$db->setTrace(true);
  
  			$db->where ($campoID, $id);
  			$db->where ($prefix."language", $key);
  			$result=$db->get ($nometabella."_data");
  			if ($db->count > 0) {
  				$db->where ($prefix."language", $key);
  				$db->where ($campoID, $_POST[$campoID]);
  				$db->update ($nometabella."_data", $data);
  			}else{
  				$data[$campoID]=$id;
  				$data[$prefix."language"]=$key;
  				$iddata = $db->insert ($nometabella."_data", $data);
  			}
  		}
    }
  }
  //###################################  FINE SI MULTILINGUA
  
	$second=2;
	if ($db->getLastErrno() === 0){
		if (in_update()){
			printLabel($config["lang"],"updOk");
		}else{
			printLabel($config["lang"],"insOk");
		}
		//non ci sono stati problemi: Commit
		$db->commit();
	}else{
		if (in_update()){
			printLabel($config["lang"],"updKo");
		}else{
			printLabel($config["lang"],"insKo");
		}
		//ci sono stati problemi: Rollback
		$db->rollback();
		var_dump($db->getLastError());
		//var_dump($db->trace);
		$second=5;
	}
	if (isset($sublist) && $sublist){
		//entra solo s esiamo in una listsub
			$linktocomeback=str_ireplace("|FOREIGNKEYTOCOMEBACK|",$_POST[$nomeforeignkey],$linktocomeback);
			echo "<meta http-equiv=\"Refresh\" content=\"{$second}; {$linktocomeback}\">";
	}else{
			echo "<meta http-equiv=\"Refresh\" content=\"{$second}; url=index.php?sect={$_GET["sect"]}&lev=list\">";
	}
    exit;
?>

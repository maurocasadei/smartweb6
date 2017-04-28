<?php
	$db->setTrace(true);
	$db->startTransaction();
        error_log("dee");
	$db->where ($campoID, $_GET[$campoID]);
	$db->delete ($nometabella);
  if ($config["multilanguage"]){    
  	//cancello i campi in multilingua
  	foreach ($config["language"] as $key => $language){
  		$db->setTrace(true);
  		$db->where ($campoID, $_GET[$campoID]);
  		$db->where ($prefix."language", $key);
  		$db->delete ($nometabella."_data");
  		if ($db->getLastErrno() !== 0){break;}
  		error_log(serialize($db->trace));
  	}
	}
	$second=2;
	if ($db->getLastErrno() === 0){
		printLabel($config["lang"],"remOk");
		//non ci sono stati problemi: Commit
		$db->commit();
	}else{
		printLabel($config["lang"],"remKo");
		//ci sono stati problemi: Rollback
		$db->rollback();
		var_dump($db->getLastError());
		//var_dump($db->trace);
		$second=5;
	}
	if (isset($sublist) && $sublist){
		//entra solo s esiamo in una listsub
			$linktocomeback=str_ireplace("|FOREIGNKEYTOCOMEBACK|",$_GET["IDForeignkey"],$linktocomeback);
			echo "<meta http-equiv=\"Refresh\" content=\"{$second}; {$linktocomeback}\">";
	}else{
			echo "<meta http-equiv=\"Refresh\" content=\"{$second}; url=index.php?sect={$_GET["sect"]}&lev=list\">";
	}
    exit;
?>

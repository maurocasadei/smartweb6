<?php
function cp($val){
	return addslashes($val);
}
function in_update(){
	$ret=false;
	if (isset($_GET["lev"]) && ($_GET["lev"]=="upd" || $_GET["lev"]=="updmenu" || $_GET["lev"]=="updlistsub")){$ret=true;}
	return $ret;
}
function dataitaeng($data){
	try{
		return substr($data, 6, 4)."-".substr($data, 3, 2)."-".substr($data, 0, 2);
	}catch(Exception $e){
		echo $e->getMessage();
	}

}
?>

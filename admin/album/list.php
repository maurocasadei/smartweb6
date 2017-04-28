	<?php include_once("general/listClass.php");?>
	<?php
		$list=array();
		$c = new Column;$c->setField("al_IDAlbum");$c->setModal(true);$c->setLabel("comandi");$c->setTipo("comandi");array_push($list,$c);$c->setSect($sect);
		$c = new Column;$c->setField("al_IDAlbum");$c->setLabel("IDAlbum");array_push($list,$c);
		$c = new Column;$c->setField("al_nome");$c->setLabel("Nome");array_push($list,$c);
	?>
	<?php
	function loadFilter(){
	}
	function makeRicerca($db){
		foreach ($_POST as $name => $value) {
			$realName=str_replace("-search-","",$name);
			$db->where ("$realName like ?",array("%".$value."%"));
		}
		return $db;
	}
	?>	
	<?php include_once("param.php");?>
	<?php include_once("general/list.php");?>

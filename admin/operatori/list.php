	<?php include_once("general/listClass.php");?>
	<?php
		$list=array();
		$c = new Column;$c->setField("adm_IDAdmin");$c->setLabel("comandi");$c->setModal(false);$c->setTipo("comandi");array_push($list,$c);
		$c = new Column;$c->setField("adm_IDAdmin");$c->setLabel("ID");array_push($list,$c);
		$c = new Column;$c->setField("adm_username");$c->setLabel("username");array_push($list,$c);
		//$c = new Column;$c->setField("adm_password");$c->setLabel("password");array_push($list,$c);
		$c = new Column;$c->setField("adm_livello");$c->setLabel("livello");array_push($list,$c);
		//$c = new Column;$c->setField("adm_descrizione");$c->setLabel("descrizione");array_push($list,$c);
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

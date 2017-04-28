	<?php include_once("general/listClass.php");?>
	<?php include_once("general/dettClass.php");?>
	<?php include_once("general/createFields.php");?>
	<?php include_once("paramlistsubalbumfoto.php");?>
	<?php        
    //serve per l'update da "fuori"
    if (!isset($IDForeignkey)){$IDForeignkey=$_GET["IDForeignkey"];}
		$list=array();
		$c = new Column;$c->setField("af_IDAlbumfoto");$c->setLabel("comandi");$c->setModal(true);$c->setTipo("comandi");array_push($list,$c); $c->setSect($sectSublist);
		$c = new Column;$c->setField("af_IDAlbumfoto");$c->setLabel("IDAlbumfoto");array_push($list,$c);
		$c = new Column;$c->setField("af_nome");$c->setLabel("Nome");array_push($list,$c);
		$c = new Column;$c->setField("af_immagine");$c->setLabel("Immagine");$c->setWidth("");$c->setHeight("50");$c->setTipo("image");array_push($list,$c);
	?>
	<?php include_once("general/list.php");?>
  <?php 
	function loadFilter(){
  //non usarefiltri nelle subliste non andrebbero
		global $config;
	}
	function makeRicerca($db){
		foreach ($_POST as $name => $value) {
			$realName=str_replace("-search-","",$name);
			$db->where ("$realName like ?",array("%".$value."%"));
		}
		return $db;
	}
  ?>
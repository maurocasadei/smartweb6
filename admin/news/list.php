
	<?php include_once("general/listClass.php");?>
	<?php include_once("general/dettClass.php");?>
	<?php include_once("general/createFields.php");?>
	<?php
		$list=array();
		$c = new Column;$c->setField("nw_IDNews");$c->setLabel("comandi");$c->setModal(true);$c->setSect($sect);$c->setTipo("comandi");array_push($list,$c);
		$c = new Column;$c->setField("nw_IDNews");$c->setLabel("IDNews");array_push($list,$c);
		$c = new Column;$c->setField("nw_titolo");$c->setLabel("titolo");array_push($list,$c);
		$c = new Column;$c->setField("nw_data");$c->setLabel("data");array_push($list,$c);
		$c = new Column;$c->setField("nw_claim");$c->setLabel("claim");array_push($list,$c);
		$c = new Column;$c->setField("nw_immagine");$c->setLabel("Immagine");$c->setWidth("");$c->setHeight("50");$c->setTipo("image");array_push($list,$c);
	?>
	<?php
	function loadFilter(){
		global $config;?>
		<form name="listform" data-toggle="validator" method="POST" action="#" enctype="multipart/form-data" >
			<div class="form-group">
				<?php
					$f = new Fields;$f->setFieldDbName("nw_titolo");$f->setLabel("Titolo");$f->setTipo("text");
					if(isset($_POST["nw_titolo"])){$f->setDefaultValue($_POST["nw_titolo"]);}
					createFields($f,null);
				?>
			</div>
			<div class="form-group">
				<?php
					$f = new Fields;$f->setFieldDbName("nw_claim");$f->setLabel("Claim");$f->setTipo("text");
					if(isset($_POST["nw_claim"])){$f->setDefaultValue($_POST["nw_claim"]);}
					createFields($f,null);
				?>
			</div>
			<div class="form-group">
				<button type="button" tipo="ricerca" class="btn btn-primary"><?php printLabel($config["lang"],"comandor"); ?></button>
			</div>
		</form>

	<?php }
	function makeRicerca($db){
		foreach ($_POST as $name => $value) {
			$realName=str_replace("-search-","",$name);
			$db->where ("$realName like ?",array("%".$value."%"));
		}
		return $db;
	}?>
	<?php include_once("param.php");?>
	<?php include_once("general/list.php");?>
<!-- Default bootstrap modal example -->

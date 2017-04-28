	<?php include_once("general/listClass.php");?>
	<?php include_once("general/dettClass.php");?>
	<?php include_once("general/createFields.php");?>
	<?php
		$list=array();
		$c = new Column;$c->setField("cn_IDContenuto");$c->setLabel("comandi");$c->setModal(true);$c->setTipo("comandi");array_push($list,$c);$c->setNomeCampoDaAssegnare("cn_titolo");
		$c = new Column;$c->setField("cn_IDContenuto");$c->setLabel("IDContenuto");array_push($list,$c);
		$c = new Column;$c->setField("cn_titolo");$c->setLabel("Titolo");array_push($list,$c);
		$c = new Column;$c->setField("cn_slug");$c->setLabel("Slug");array_push($list,$c);

	?>
	<?php
	function loadFilter(){
		global $config;?>
		<form data-toggle="validator" method="POST" action="#" enctype="multipart/form-data" >
			<div class="form-group">
				<?php
					$f = new Fields;$f->setFieldDbName("cn_titolo");$f->setLabel("Titolo");$f->setTipo("text");
					if(isset($_POST["cn_titolo"])){$f->setDefaultValue($_POST["cn_titolo"]);}
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

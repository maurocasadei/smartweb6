	<?php include_once("general/listClass.php");?>
	<?php
	?>
	<?php include_once("param.php");?>
		<?php include_once("{$config["includepathadmin"]}general/header.php");?>
    <main class="qpc-main-content">
    
		<?php include_once("{$config["includepathadmin"]}config/menu.php");?>
    <div class="content-wrapper">

    <ol class="breadcrumb breadcrumb-qpc">
      <li><a href="index.php">Home</a></li>
      <li class="active"><?php printLabel($config["lang"],$titolo); ?></li>
      <li class="active"><?php printLabel($config["lang"],$sottotitolo); ?></li>
    </ol>
        <div class="">
					<button <?php echo "sect=$sect"; ?> <?php echo "lev=$lev"; ?> class="btn btn-primary" tipo="ins" data-toggle="modal"  data-placement="left" title="<?php printLabel($config["lang"],"comandoi"); ?>"><i class="fa fa-plus" aria-hidden="true"></i> <?php printLabel($config["lang"],"comandoi"); ?></button>

										<ol class="nested_with_switch vertical">
										<?php
										$db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
										$db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $config["languageprimary"]);
										$db->where ("mn_livello", 1);
										$db->orderBy ("mn_ordine", "asc");
										$result=$db->get ("{$nometabella} p");
										if ($db->count > 0) {
											foreach ($result as $r) {
												echo "<li>{$r["mn_nome"]}";
												echo "<div class=\"wrap-icon-menu\" data-id=\"{$r["mn_IDMenu"]}\">";
  												$c = new Column;$c->setField("mn_IDMenu");$c->setLabel("comandi");$c->setTipo("comandi");
  												setField($c,$r,1);
												echo "</div>";
													//2 livello
													$db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
													$db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $config["languageprimary"]);
													$db->where ("mn_livello", 2);
													$db->where ("mn_IDPadre", $r["mn_IDMenu"]);
													$db->orderBy ("mn_ordine", "asc");
													$result2=$db->get ("{$nometabella} p");
													if ($db->count > 0) {
														echo "<ol class=\"nested_with_switch vertical\">";
														foreach ($result2 as $r2) {
															echo "<li>{$r2["mn_nome"]}";
																echo "<div class=\"wrap-icon-menu\" data-id=\"{$r2["mn_IDMenu"]}\">";
  																$c = new Column;$c->setField("mn_IDMenu");$c->setLabel("comandi");$c->setTipo("comandi");
  																setField($c,$r2,2);
        												echo "</div>";
																//3 livello
																$db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
																$db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $config["languageprimary"]);
																$db->where ("mn_livello", 3);
																$db->where ("mn_IDPadre", $r2["mn_IDMenu"]);
																$db->orderBy ("mn_ordine", "asc");
																$result3=$db->get ("{$nometabella} p");
																if ($db->count > 0) {
																	echo "<ol class=\"nested_with_switch vertical\">";
																	foreach ($result3 as $r3) {
																		echo "<li >{$r3["mn_nome"]}";
																			echo "<div class=\"wrap-icon-menu\" data-id=\"{$r3["mn_IDMenu"]}\">";
  																			$c = new Column;$c->setField("mn_IDMenu");$c->setLabel("comandi");$c->setTipo("comandi");
  																			setField($c,$r3,3);
              												echo "</div>";
																		echo "</li>";
																	}
																	echo "</ol>";
																}
															echo "</li>";
														}
														echo "</ol>";
													}
												echo "</li>";
											}
										}
										?>
										</ol>
  </div>
  </div> <!-- .content-wrapper -->
  </main> <!-- .qpc-main-content -->
<?php

function setField($c,$r,$livello){
	global $config,$campoID;
	switch ($c->Tipo){
		case "text":
			echo "<td>".$r[$c->Field]."</td>";
			break;
		case "comandi":
			$update=findLabel($config["lang"],"comandou");
			$delete=findLabel($config["lang"],"comandod");
			$insert=findLabel($config["lang"],"comandoi");
			$ID=$r[$c->Field];
$td=<<<MORELINE
					<button class="btn-margin remove btn-sm btn-danger" id="{$ID}" IDName="{$campoID}" tipo="rem" data-toggle="tooltip" data-placement="right" title="{$delete}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
					<button class="btn-margin duplicate btn-sm btn-info" mn_IDMenu="{$ID}" mn_IDPadre="" mn_livello="{$livello}" tipo="updmenu" data-toggle="tooltip" data-placement="left" title="{$update}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
					<button class="btn-margin duplicate btn-sm btn-info" mn_IDMenu="{$ID}" mn_IDPadre="" mn_livello="{$livello}" tipo="updmenu" data-toggle="tooltip" data-placement="left" title="{$update}"><i class="fa fa-files-o" aria-hidden="true"></i></button>
MORELINE;

			if ($livello<3)		{
$td.=<<<MORELINE
					<button class="btn-margin insert btn-sm btn-primary" mn_livello="{$livello}" mn_IDPadre="{$ID}" tipo="addmenu" data-toggle="tooltip" data-placement="right" title="{$insert}"><i class="fa fa-plus" aria-hidden="true"></i></button>
MORELINE;

			}
		echo $td;
		break;
	}

}
?>

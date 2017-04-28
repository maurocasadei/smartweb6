		<?php include_once("{$config["includepathadmin"]}general/header.php");?>
    <?php if (! isset($_GET["modal"])){?> 
    <main class="qpc-main-content">
    <div class="content-wrapper">
    <?php }?>    
		<?php include_once("{$config["includepathadmin"]}config/menu.php");?>
<?php 
  if (isset($insertmodal) && $insertmodal){
    $modal="modal";
  }else{
    $modal="";
  }
    if (!isset($IDForeignkey)){$IDForeignkey=0;}
//  error_log($insertmodal);
?>
    <?php $suffixtable=rand(1, 100); // serve per utilizzare più liste?>
  <div id="content-table<?php echo $suffixtable; ?>">
    <ol class="breadcrumb breadcrumb-qpc">
      <li><a href="index.php">Home</a></li>
      <li class="active"><?php printLabel($config["lang"],$titolo); ?></li>
      <li class="active"><?php printLabel($config["lang"],$sottotitolo); ?></li>
    </ol>
      <div class="">
          <div id="toolbar">
              <button suffixtable="<?php echo $suffixtable?>"  <?php echo "sect=$sect"; ?> <?php echo "lev=$lev"; ?> id="insert" IDForeignkey="<?php echo $IDForeignkey ?>" class="btn btn-primary" tipo="ins<?php echo $modal?>" data-toggle="tooltip" data-placement="left" title="<?php printLabel($config["lang"],"comandoi"); ?>">
                <i class="glyphicon glyphicon-plus"></i> Inserisci
              </button>
              <button id="buttonrefresh<?php echo $suffixtable; ?>" <?php echo "sect=$sect"; ?> <?php echo "lev=$lev"; ?> <?php echo "suffixtable=\"$suffixtable\""; ?> IDForeignkey="<?php echo $IDForeignkey ?>"   class="btn btn-primary" tipo="refresh" data-toggle="tooltip" data-placement="left" title="<?php printLabel($config["lang"],"comandoa"); ?>">
                <i class="glyphicon glyphicon-refresh"></i> Aggiorna
              </button>
          </div>

          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#accordion" aria-expanded="false" aria-controls="collapseExample">
            Ricerca tramite query
          </button>
          <div class="collapse" id="accordion">
            <div class="well">
              <form class="form-inline" id="formricerca<?php echo $suffixtable?>" data-toggle="validator" role="form" method="POST" name="ricerca">
                <?php loadFilter(); ?>
              </form>
            </div>
          </div>
      </div>
      <table id="dataTableSS" suffixtable="<?php echo $suffixtable?>" class="table table-bordered table-striped table-hover">
			<thead>
        <tr>
					<?php
						foreach ($list as $c) {
							echo "<th>{$c->Label}</th>";
						}
					?>
        </tr>
      </thead>
      <tbody>
						<?php
            $db->setTrace(true);           
						$db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
						$db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $config["languageprimary"]);
            if ($nomeforeignkey != "mainlist"){$db->where("$nomeforeignkey", $IDForeignkey);}
            
            $lev2="";
						if (isset($_GET["lev2"])){$lev2=$_GET["lev2"];}
						switch ($lev2){
							case "ricerca":
								$db=makeRicerca($db);
						}

            if (isset($campoorderby)){$db->orderBy("{$campoorderby}","asc");}
						$result=$db->get ("{$nometabella} p",null,"*,p.{$campoID} as {$campoID}");
            //error_log (serialize($db->trace));
						if ($db->count > 0) {
							foreach ($result as $r) {
								//var_dump($r);
								echo "<tr>";
								foreach ($list as $c) {
                  $c->setSuffix ($suffixtable);
									setField($c,$r);
								}
								echo "</tr>";
							}
						}
						?>
            </tr>
        </tbody>
      </table>  
    </div> <!-- .content-wrapper -->
  <?php if (! isset($_GET["modal"])){?> 
    </div>  
  </main> <!-- .qpc-main-content -->
<?php }?>
</body>

</html>
<?php

function setField($c,$r){
	global $config,$campoID,$sect,$lev,$IDForeignkey;
	switch ($c->Tipo){
		case "text":
			echo "<td>".$r[$c->Field]."</td>";
			break;
		case "comandi":
			$update=findLabel($config["lang"],"comandou");
			$delete=findLabel($config["lang"],"comandod");
			$assegna=findLabel($config["lang"],"comandoass");
			$ID=$r[$c->Field];
      if ($c->Modal){$modal="modal";}else{$modal="";}
      $sectWrite=$sect;if (isset($c->Sect) && $c->Sect != ""){$sectWrite=$c->Sect;}
      $levWrite=$lev;if (isset($c->Lev) && $c->Lev != ""){$levWrite=$c->Lev;}
//      error_log( $_SERVER['QUERY_STRING'] );
      $CampoDaAssegnare="";
$td=<<<MORELINE
				<td>               
          <button suffixtable="{$c->Suffix}" sect="{$sectWrite}" lev="{$levWrite}" class="btn btn-primary" id="{$ID}" IDName="{$campoID}" tipo="upd{$modal}" IDForeignkey="{$IDForeignkey}" href="#" data-toggle="tooltip" data-placement="left" title="{$update}"><i class="fa fa-pencil" aria-hidden="true"></i> $update</button>
					<button suffixtable="{$c->Suffix}" sect="{$sectWrite}" lev="rem"  class="btn btn-danger btn-primary" id="{$ID}" IDName="{$campoID}" IDForeignkey="{$IDForeignkey}" tipo="rem" data-toggle="tooltip" data-placement="right" title="{$delete}"><i class="fa fa-trash-o" aria-hidden="true"></i> $delete</button>
MORELINE;
      if (isset($_GET["CampoDaAssegnare"])){
        $TestoCampoDaAssegnare=$r[$c->NomeCampoDaAssegnare]; 
        $CampoDaAssegnare="TestoCampoDaAssegnare=\"{$TestoCampoDaAssegnare}\"  CampoDaAssegnare=\"{$_GET["CampoDaAssegnare"]}\"";
        $suffixtableperassegna="";
        if (isset($_GET["suffixtable"])){
          $suffixtableperassegna=$_GET["suffixtable"]; 
        }
$td.=<<<MORELINE
          <button {$CampoDaAssegnare} suffixtable="{$suffixtableperassegna}" sect="{$sectWrite}" lev="{$levWrite}" class="btn btn-primary" id="{$ID}" IDName="{$campoID}" IDForeignkey="{$IDForeignkey}" tipo="assegna" href="#" data-toggle="tooltip" data-placement="left" title="{$assegna}"><i class="fa fa-pencil" aria-hidden="true"></i> $assegna</button>
MORELINE;
      }
		$td.="</td>";
    echo $td;
		break;
		case "image":
			echo "<td><img src=\"{$config["siteurl"]}{$r[$c->Field]}\" width=\"{$c->Width}\" height=\"{$c->Height}\" /></td>";
			break;
	}

}
?>

<?php 
  if (isset($insertmodal)){
    $modal="modal";
  }else{
    $modal="";
  }
  $suffixtable=rand(1, 100); // serve per utilizzare più liste
  
?>

  <div id="content-table<?php echo $suffixtable; ?>">
              <div id="toolbar">
                <button suffixtable="<?php echo $suffixtable?>"  <?php echo $modal ?> sect="<?php echo $sectSublist ?>" IDForeignkey="<?php echo $IDForeignkey ?>"  class="btn btn-primary" tipo="inslistsub<?php echo $modal?>" data-toggle="tooltip" data-placement="left" title="<?php printLabel($config["lang"],"comandoi"); ?>">
                  <i class="glyphicon glyphicon-plus"></i> Inserisci
                </button>
                <button id="buttonrefresh<?php echo $suffixtable; ?>" <?php echo $modal ?> <?php echo "sect=$sectSublist"; ?> IDForeignkey="<?php echo $IDForeignkey ?>"  <?php echo "lev=$lev"; ?> <?php echo "suffixtable=\"$suffixtable\""; ?> class="btn btn-primary" tipo="refresh" data-toggle="tooltip" data-placement="left" title="<?php printLabel($config["lang"],"comandoa"); ?>">
                  <i class="glyphicon glyphicon-refresh"></i> Aggiorna
                </button>
              </div>
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#accordion<?php echo $suffixtable; ?>" aria-expanded="false" aria-controls="collapseExample">
                Ricerca tramite query
              </button>
              <div class="collapse" id="accordion<?php echo $suffixtable; ?>">
                <div class="well">
                  <form class="form-inline row" id="formricerca<?php echo $suffixtable?>" data-toggle="validator" role="form" method="POST" name="ricerca">
                    <?php loadFilterSub(); ?>
                  </form>  
                </div>
              </div>
              <table id="dataTableSS" suffixtable="<?php echo $suffixtable?>"  class="table table-bordered table-striped table-hover">
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
											$db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
											$db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $config["languageprimary"]);
                      $db->where("$nomeforeignkey", $IDForeignkey);
                      if (isset($campoorderby)){$db->orderBy("{$campoorderby}","asc");}
											$result=$db->get ("{$nometabella} p",null,"*,p.{$campoID} as {$campoID}");
											if ($db->count > 0) {
												foreach ($result as $r) {
													echo "<tr>";
													foreach ($list as $c) {
                            $c->setSuffix ($suffixtable);                      
														setField($c,$r);
													}
													echo "</tr>";
												}
											}
											?>
                </tbody>
            </table>
      </div>



<?php
function setField($c,$r){
global $config,$campoID,$IDForeignkey,$sectSublist,$sect,$lev;
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
      if (isset($_GET["CampoDaAssegnare"])){
        $TestoCampoDaAssegnare=$r[$c->NomeCampoDaAssegnare]; 
        $CampoDaAssegnare="TestoCampoDaAssegnare=\"{$TestoCampoDaAssegnare}\"  CampoDaAssegnare=\"{$_GET["CampoDaAssegnare"]}\"";
      }
$td=<<<MORELINE
				<td>               
          <button suffixtable="{$c->Suffix}" sect="{$sectSublist}" lev="{$levWrite}" class="btn btn-primary" id="{$ID}" IDForeignkey="{$IDForeignkey}"  IDName="{$campoID}" tipo="updlistsub{$modal}" href="#" data-toggle="tooltip" data-placement="left" title="{$update}"><i class="fa fa-pencil" aria-hidden="true"></i> $update</button>
					<button suffixtable="{$c->Suffix}" sect="{$sectSublist}" lev="{$levWrite}" class="btn btn-danger btn-primary" id="{$ID}" IDForeignkey="{$IDForeignkey}"  IDName="{$campoID}" tipo="rem" data-toggle="tooltip" data-placement="right" title="{$delete}"><i class="fa fa-trash-o" aria-hidden="true"></i> $delete</button>
          <button {$CampoDaAssegnare} suffixtable="{$c->Suffix}" sect="{$sectSublist}" lev="{$levWrite}" class="btn btn-primary" id="{$ID}" IDName="{$campoID}" tipo="assegna" href="#" data-toggle="tooltip" data-placement="left" title="{$assegna}"><i class="fa fa-pencil" aria-hidden="true"></i> $assegna</button>
				</td>
MORELINE;
		echo $td;
		break;
		case "image":
			echo "<td><img src=\"{$config["siteurl"]}{$r[$c->Field]}\" width=\"{$c->Width}\" height=\"{$c->Height}\" /></td>";
			break;
	}

}
?>

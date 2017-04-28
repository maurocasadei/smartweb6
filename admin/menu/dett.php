<?php include_once("general/dettClass.php");?>
<?php include_once("param.php");?>
<?php include_once("general/dett.php");?>

<?php
function remove(){
	global $config,$db,$titolo,$sottotitolo,$nometabella,$campoID,$prefix;
	include_once ("general/dettRemove.inc.php");
}
function salva(){
	global $config,$db,$titolo,$sottotitolo,$nometabella,$campoID,$prefix;
	$arCampiNoMultilingua=array();
	$f = new Fields;$f->setFieldDbNameAndValue("mn_ordine");$f->setTipo("number");
  $arCampiNoMultilingua[]=$f;
  $f = new Fields;$f->setFieldDbNameAndValue("mn_link");$f->setTipo("url");
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("mn_livello");$f->setTipo("number");
  $arCampiNoMultilingua[]=$f;
  $f = new Fields;$f->setFieldDbNameAndValue("mn_tipomenu");$f->setTipo("select");
  $arCampiNoMultilingua[]=$f;
  if (isset($_POST["mn_visibile"])){$data["mn_visibile"] = $_POST["mn_visibile"];}
  $f = new Fields;$f->setFieldDbNameAndValue("mn_visibile");$f->setTipo("checkbox");
  $arCampiNoMultilingua[]=$f;
  if (isset($_POST["mn_IDPadre"])){$data["mn_IDPadre"] = $_POST["mn_IDPadre"];}
  $f = new Fields;$f->setFieldDbNameAndValue("mn_IDPadre");$f->setTipo("select");
  $arCampiNoMultilingua[]=$f;
  if (isset($_POST["mn_IDContenuto"])){$data["mn_IDContenuto"] = $_POST["mn_IDContenuto"];}
  $f = new Fields;$f->setFieldDbNameAndValue("mn_IDContenuto");$f->setTipo("select");
  $arCampiNoMultilingua[]=$f;

  $arCampiSiMultilingua=array();
	$f = new Fields;$f->setFieldDbNameAndValue("mn_nome");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;
  

	include_once ("general/dettSalva.inc.php");
}

function form_dv(){
	global $config,$db,$titolo,$sottotitolo,$nometabella,$campoID,$prefix,$sect,$lev,$ssfieldattruniqueform;
	//se siamo in modifica
	$r=null;$mn_livelloSelectPadri=1;$mn_IDPadre=0;$mn_livelloInsert=1;
	if (in_update()){
		$db->where ($campoID, $_GET[$campoID]);
		$result=$db->get ($nometabella);
		if ($db->count > 0) {
			$r=$result[0];
		}
		if (isset($_GET["mn_livello"])){$mn_livelloSelectPadri=$_GET["mn_livello"]-1;} //carico i livelli padre precedenti
	}else{
		if (isset($_GET["mn_livello"])){$$mn_livelloSelectPadri=$_GET["mn_livello"];$mn_livelloInsert=$_GET["mn_livello"]+1;}
		if (isset($_GET["mn_IDPadre"])){$mn_IDPadre=$_GET["mn_IDPadre"];}
	}
	//var_dump($r);
	//print $mn_livello.$mn_livelloInsert;
	?>
	<form id="data-form<?php echo $ssfieldattruniqueform?>" data-toggle="validator" method="POST" action="#" enctype="multipart/form-data" sect="<?php echo $sect; ?>" lev="<?php echo $lev; ?>">
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue($campoID);$f->setLabel($campoID);$f->setTipo("text");$f->setReadonly("readonly");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("mn_ordine");$f->setLabel("Ordine");$f->setTipo("number");$f->setRequired("required");$f->setDefaultValue("1");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("mn_livello");$f->setLabel("Livello");$f->setTipo("number");$f->setRequired("required");$f->setDefaultValue($mn_livelloInsert);
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("mn_visibile");$f->setLabel("Visibile");$f->setTipo("checkbox");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$resultSelected=array();
					array_push($resultSelected,array("label"=>"alto","value"=>"alto"));
					array_push($resultSelected,array("label"=>"basso","value"=>"basso"));
					$f = new Fields;$f->setFieldDbNameAndValue("mn_tipomenu");$f->setLabel("Tipo Menù");$f->setTipo("select");$f->setRequired("required");
					createFields($f,$r,$resultSelected);

			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$resultSelected=array();
					//caricamentoCombo
					$nometabellaSelect="menu";$campoIDSelect="mn_IDMenu";$prefixSelect="mn_";
					$db->join("{$nometabellaSelect}_data d", "d.{$campoIDSelect}=p.{$campoIDSelect}", "LEFT");
					$db->joinWhere("{$nometabellaSelect}_data d", "d.{$prefixSelect}language", $config["languageprimary"]);
					$db->where ("mn_livello", $mn_livelloSelectPadri);
					$resultSelected=$db->get ("{$nometabellaSelect} p",null,"d.$campoIDSelect as value,d.mn_nome as label");
					$f = new Fields;$f->setFieldDbNameAndValue("mn_IDPadre");$f->setLabel("Menù Padre");$f->setTipo("select");$f->setRequired("required");$f->setDefaultValue($mn_IDPadre);
					createFields($f,$r,$resultSelected);

			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$resultSelected=array();
					//caricamentoCombo
					$nometabellaSelect="contenuto";$campoIDSelect="cn_IDContenuto";$prefixSelect="cn_";
					$db->join("{$nometabellaSelect}_data d", "d.{$campoIDSelect}=p.{$campoIDSelect}", "LEFT");
					$db->joinWhere("{$nometabellaSelect}_data d", "d.{$prefixSelect}language", $config["languageprimary"]);
					$resultSelected=$db->get ("{$nometabellaSelect} p",null,"d.$campoIDSelect as value,d.cn_Titolo as label");
					$f = new Fields;$f->setFieldDbNameAndValue("mn_IDContenuto");$f->setLabel("Pagina Richiamata");$f->setTipo("select");$f->setRequired("required");
					createFields($f,$r,$resultSelected);

			?>
		</div>
		<div class="form-group col-md-2">
			<?php
          //creo pulsante vaia
          //il name è l'ID della pagina richiamata, mentre il value quello della foreign key della tabella corrente
					$f = new Fields;$f->setFieldDbName("cn_IDContenuto");$f->setFieldDbValue("mn_IDContenuto");$f->setLabel("");$f->setTipo("buttons");$f->setLev("upd");$f->setSect("pagine");$f->setCampoDaAssegnare("mn_IDContenuto");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("mn_link");$f->setLabel("Link");$f->setTipo("url");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>

		<!-- ########################################### -->
		<!-- #############     LINGUE     ############## -->
		<div class="form-group col-md-12">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
			<?php
				$active="active";
				foreach ($config["language"] as $key => $language){
					echo "<li class=\"{$active}\"><a href=\"#tab{$key}{$ssfieldattruniqueform}\" data-toggle=\"tab\">{$language}</a></li>";
					$active="";
				}
			?>
			</ul>
			<div class="tab-content col-md-12">
				<?php
          $active="active";
					foreach ($config["language"] as $key => $language){
echo <<<MORELINE
				<div class="tab-pane fade in {$active}" id="tab{$key}{$ssfieldattruniqueform}">
					<div class="panel-body">
MORELINE;
					$r_data=null; $active="";
					$db->where ($campoID, $r[$campoID]);
					$db->where ("{$prefix}language", $key);
					$result_data=$db->get ("{$nometabella}_data d");
					if ($db->count > 0) {
						$r_data=$result_data[0];
					}
				echo "<div class=\"form-group col-md-12\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}mn_nome");$f->setFieldDbValue("mn_nome");$f->setLabel("Nome");$f->setTipo("text");
					createFields($f,$r_data);
				echo "</div>";

					echo <<<MORELINE
					</div>
				</div>
MORELINE;
					}
				?>
			</div>
		</div>
		<!-- #############     LINGUE     ############## -->
		<!-- ########################################### -->

		<div class="form-group col-md-12">
      <?php $suffixtable="";if (isset($_GET["suffixtable"])){$suffixtable=$_GET["suffixtable"];}?>
			<button ssfieldattruniqueform="<?php echo $ssfieldattruniqueform?>" suffixtable="<?php echo $suffixtable?>"  type="button" tipo="salva" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php printLabel($config["lang"],"comandos"); ?></button>
		</div>
   <br>

	</form>
<?php
}
?>
<script language="javascript">
    function validate(){
      var ret=true;
      ret=validategeneral();
      return ret;    
    }
    
</script>
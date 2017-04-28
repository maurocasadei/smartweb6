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
	$f = new Fields;$f->setFieldDbNameAndValue("adm_username");$f->setTipo("text");
  $arCampiNoMultilingua[]=$f;
	if (isset($_POST["adm_password"]) && $_POST["adm_password"] != ""){$_POST["adm_password"]=md5($_POST["adm_password"]);}else{unset($_POST["adm_password"]);}
	$f = new Fields;$f->setFieldDbNameAndValue("adm_password");$f->setTipo("text");
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("adm_livello");$f->setTipo("radio");
  $arCampiNoMultilingua[]=$f;

  $arCampiSiMultilingua=array();
	$f = new Fields;$f->setFieldDbNameAndValue("adm_descrizione");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("adm_ruolo");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;

	include_once ("general/dettSalva.inc.php");
}
function form_dv(){
	global $config,$db,$titolo,$sottotitolo,$nometabella,$campoID,$prefix,$sect,$lev,$ssfieldattruniqueform;
	//se siamo in modifica
	$r=null;
	if (in_update()){
		$db->where ($campoID, $_GET[$campoID]);
		$result=$db->get ($nometabella);
		if ($db->count > 0) {
			$r=$result[0];
		}
	}
	?>
	<form id="data-form<?php echo $ssfieldattruniqueform?>" data-toggle="validator" method="POST" action="#" sect="<?php echo $sect; ?>" lev="<?php echo $lev; ?>">
		<div class="form-group col-md-2">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue($campoID);$f->setLabel($campoID);$f->setTipo("text");$f->setReadonly("readonly");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("adm_username");$f->setLabel("Username");$f->setTipo("text");$f->setRequired("text-required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-3">
					<?php
							$f = new Fields;$f->setFieldDbNameAndValue("adm_password");$f->setLabel("Password");$f->setTipo("password");
							createFields($f,null); //passo null per fare in modo che la password non venga proposta
					?>
		</div>
		<div class="form-group col-md-3">
					<?php
							$f = new Fields;$f->setFieldDbName("adm_confirmpassword");$f->setFieldDbValue("adm_password");$f->setLabel("Conferma Password");$f->setTipo("password");$f->setRequired("required");$f->SetPropertyAdd("data-match=\"#password\" data-match-error=\"Whoops, these don't match\"");
							createFields($f,null); //passo null per fare in modo che la password non venga proposta
					?>
		</div>
		<div class="form-group col-md-12">
		<?php
				$f = new Fields;$f->setFieldDbNameAndValue("adm_livello");$f->setLabel("Livello:");$f->setTipo("radio");
				$arLabelValue=array();
				$lb=new LabelValue;$lb->setLabelAndValue("A");array_push($arLabelValue,$lb);
				$lb=new LabelValue;$lb->setLabelAndValue("N");array_push($arLabelValue,$lb);
				$f->setarLabelValue($arLabelValue);
				createFields($f,$r);
		?>
		</div>

		<!-- ########################################### -->
		<!-- #############     LINGUE     ############## -->
		<div class="form-group">
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
			<div class="tab-content">
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
				echo "<div class=\"form-group col-md-8\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}adm_descrizione");$f->setFieldDbValue("adm_descrizione");$f->setLabel("Descrizione");$f->setTipo("editor");
					createFields($f,$r_data);
				echo "</div>";

				echo "<div class=\"form-group col-md-4\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}adm_ruolo");$f->setFieldDbValue("adm_ruolo");$f->setLabel("Ruolo");$f->setTipo("text");
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
			<button ssfieldattruniqueform="<?php echo $ssfieldattruniqueform?>" suffixtable="<?php echo $suffixtable?>" type="button" tipo="salva" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php printLabel($config["lang"],"comandos"); ?></button>
		</div>
   <br>
	</form>
<?php
}
?>
<script language="javascript">
    function validate(){
      var ret=true;
      ret=validategeneral("<?php echo $ssfieldattruniqueform?>");
      return ret;    
    }
</script>
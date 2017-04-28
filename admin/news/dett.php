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
	$f = new Fields;$f->setFieldDbNameAndValue("nw_ordine");$f->setTipo("number");
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_data");$f->setTipo("text");
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_scadenza");$f->setTipo("nw_scadenza");
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_immagine");$f->setTipo("image");
  $f->setImage_big_destination_folder("immagini/news/big/");$f->setImage_big_size_width(1200);$f->setImage_big_size_height(600); 
  $f->setImage_medium_destination_folder("immagini/news/medium/");$f->setImage_medium_size_width(800);$f->setImage_medium_size_height(600);    
  $f->setThumbnail_crop1_destination_folder("immagini/news/crop1/");$f->setThumbnail_crop1_size_width(450);$f->setThumbnail_crop1_size_height(250);    
  $f->setThumbnail_crop2_destination_folder("immagini/news/crop2/");$f->setThumbnail_crop2_size_width(350);$f->setThumbnail_crop2_size_height(180);   
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_inevidenza");$f->setTipo("checkbox");
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_allegato");$f->setTipo("pdf");
  $arCampiNoMultilingua[]=$f;
  
  $arCampiSiMultilingua=array();
	$f = new Fields;$f->setFieldDbNameAndValue("nw_titolo");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_claim");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_description");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_testo");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("nw_immaginelang");$f->setTipo("image");$f->setImmaginesrc("");     
  $f->setImage_big_destination_folder("immagini/news/big/");$f->setImage_big_size_width(1200);$f->setImage_big_size_height(600); 
  $f->setImage_medium_destination_folder("immagini/news/medium/");$f->setImage_medium_size_width(800);$f->setImage_medium_size_height(600);    
  $f->setThumbnail_crop1_destination_folder("immagini/news/crop1/");$f->setThumbnail_crop1_size_width(450);$f->setThumbnail_crop1_size_height(250);    
  $f->setThumbnail_crop2_destination_folder("immagini/news/crop2/");$f->setThumbnail_crop2_size_width(350);$f->setThumbnail_crop2_size_height(180);   
  $arCampiSiMultilingua[]=$f;

	include_once ("general/dettSalva.inc.php");
}
function form_dv(){
	global $config,$db,$titolo,$sottotitolo,$nometabella,$campoID,$prefix,$sect,$lev,$ssfieldattruniqueform;
	//se siamo in modifica
	$r=null;
	if (in_update()){
		//$db->setTrace(true);
		$db->where ($campoID, $_GET[$campoID]);
		$result=$db->get ($nometabella);
		//var_dump($db->trace);die;
		if ($db->count > 0) {
			$r=$result[0];
		}
	}
	?>
	<form id="data-form<?php echo $ssfieldattruniqueform?>" role="form" data-toggle="validator" method="POST" action="#" enctype="multipart/form-data" sect="<?php echo $sect; ?>" lev="<?php echo $lev; ?>" >
		<div class="form-group col-md-2">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue($campoID);$f->setLabel($campoID);$f->setTipo("text");$f->setReadonly("readonly");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-2">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("nw_ordine");$f->setLabel("Ordine");$f->setTipo("number");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-2">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("nw_data");$f->setLabel("Data");$f->setTipo("text");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-2">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("nw_inevidenza");$f->setLabel("In Evidenza");$f->setTipo("checkbox");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("nw_scadenza");$f->setLabel("Scadenza");$f->setTipo("text");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-6">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("nw_immagine");$f->setLabel("Immagine");$f->setTipo("image");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-6">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("nw_allegato");$f->setLabel("Allegato PDF");$f->setTipo("pdf");$f->setRequired("required");
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
				echo "<div class=\"form-group col-md-4\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}nw_titolo");$f->setFieldDbValue("nw_titolo");$f->setLabel("Titolo");$f->setTipo("text");$f->setRequired("text-required");
					createFields($f,$r_data);
				echo "</div>";

				echo "<div class=\"form-group  col-md-4\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}nw_claim");$f->setFieldDbValue("nw_claim");$f->setLabel("Claim");$f->setTipo("text");
					createFields($f,$r_data);
				echo "</div>";

				echo "<div class=\"form-group  col-md-4\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}nw_description");$f->setFieldDbValue("nw_description");$f->setLabel("Description");$f->setTipo("textarea");
					createFields($f,$r_data);
				echo "</div>";

				echo "<div class=\"form-group  col-md-8\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}nw_testo");$f->setFieldDbValue("nw_testo");$f->setLabel("Testo");$f->setTipo("editor");
					createFields($f,$r_data);
				echo "</div>";					
        
				echo "<div class=\"form-group  col-md-4\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}nw_immaginelang");$f->setFieldDbValue("nw_immaginelang");$f->setLabel("Immagine");$f->setTipo("image");
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
    <div class="help-block with-errors"></div>
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
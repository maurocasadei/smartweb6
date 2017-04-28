<?php include_once("general/dettClass.php");?>
<?php include_once("paramlistsubalbumfoto.php");?>
<?php include_once("general/dett.php");?>

<?php
function remove(){
	global $config,$db,$titolo,$sottotitolo,$nometabella,$campoID,$prefix,$nomeforeignkey,$linktocomeback;
	$sublist=true;//serve per ridirezionare al dettaglio chiamante
  error_log("dentro");
	include_once ("general/dettRemove.inc.php");
}
function salva(){
	global $config,$db,$titolo,$sottotitolo,$nometabella,$campoID,$prefix,$nomeforeignkey,$linktocomeback;

  $arCampiNoMultilingua=array();
	$f = new Fields;$f->setFieldDbNameAndValue("af_ordine");$f->setTipo("number");
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("af_immagine");$f->setTipo("image");
  $f->setImage_big_destination_folder("immagini/album/big/");$f->setImage_big_size_width(1200);$f->setImage_big_size_height(600); 
  $f->setImage_medium_destination_folder("immagini/album/medium/");$f->setImage_medium_size_width(800);$f->setImage_medium_size_height(600);    
  $f->setThumbnail_crop1_destination_folder("immagini/album/crop1/");$f->setThumbnail_crop1_size_width(450);$f->setThumbnail_crop1_size_height(250);    
  $f->setThumbnail_crop2_destination_folder("immagini/album/crop2/");$f->setThumbnail_crop2_size_width(350);$f->setThumbnail_crop2_size_height(180);   
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("af_IDAlbum");$f->setTipo("select");
  $arCampiNoMultilingua[]=$f;

  $arCampiSiMultilingua=array();
	$f = new Fields;$f->setFieldDbNameAndValue("af_nome");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;

	$sublist=true;//serve per ridirezionare al dettaglio chiamante
	include_once ("general/dettSalva.inc.php");
}
function form_dv(){
	global $config,$db,$titolo,$sottotitolo,$nometabella,$campoID,$prefix,$sect,$lev,$ssfieldattruniqueform;
	//se siamo in modifica
	$r=null;
	//$db->setTrace(true);
	if (in_update()){
		$db->where ($campoID, $_GET[$campoID]);
		$result=$db->get ($nometabella);
		if ($db->count > 0) {
			$r=$result[0];
		}
	}
	//var_dump($db->trace);die;
	?>
	<form id="data-form<?php echo $ssfieldattruniqueform?>" data-toggle="validator" method="POST" action="#" enctype="multipart/form-data"   sect="<?php echo $sect; ?>" lev="<?php echo $lev; ?>">
		<div class="form-group col-md-2">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue($campoID);$f->setLabel($campoID);$f->setTipo("text");$f->setReadonly("readonly");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-2">
			<?php
				$IDForeignkey=0;
				if (isset($_GET["IDForeignkey"])){$IDForeignkey=$_GET["IDForeignkey"];}
				$resultSelected=array();
				$nometabellaSelect="album";$campoIDSelect="al_IDAlbum";$prefixSelect="al_";
				$db->join("{$nometabellaSelect}_data d", "d.{$campoIDSelect}=p.{$campoIDSelect}", "LEFT");
				$db->joinWhere("{$nometabellaSelect}_data d", "d.{$prefixSelect}language", $config["languageprimary"]);
				$resultSelected=$db->get ("{$nometabellaSelect} p",null,"d.$campoIDSelect as value,d.al_nome as label");
				$f = new Fields;$f->setFieldDbNameAndValue("af_IDAlbum");$f->setLabel("Album");$f->setTipo("select");$f->setRequired("required");$f->setDefaultValue($IDForeignkey);
				createFields($f,$r,$resultSelected);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("af_ordine");$f->setLabel("Ordine");$f->setTipo("number");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("af_immagine");$f->setLabel("Copertina");$f->setTipo("image");
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
        $rnd=rand(5, 15);
				foreach ($config["language"] as $key => $language){
					echo "<li class=\"{$active}\"><a href=\"#tab{$rnd}-{$key}{$ssfieldattruniqueform}\" data-toggle=\"tab\">{$language}</a></li>";
					$active="";
				}
			?>
			</ul>
			<div class="tab-content">
				<?php
          $active="active";
					foreach ($config["language"] as $key => $language){ 
echo <<<MORELINE
				<div class="tab-pane fade in {$active}" id="tab{$rnd}-{$key}{$ssfieldattruniqueform}">
					<div class="panel-body">
MORELINE;
					$r_data=null;  $active="";
					$db->where ($campoID, $r[$campoID]);
					$db->where ("{$prefix}language", $key);
					$result_data=$db->get ("{$nometabella}_data d");
					if ($db->count > 0) {
						$r_data=$result_data[0];
					}
				echo "<div class=\"form-group\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}af_nome");$f->setFieldDbValue("af_nome");$f->setLabel("Descrizione Foto");$f->setTipo("text");
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
      ret=validategeneral();
      return ret;    
    }
    
</script>
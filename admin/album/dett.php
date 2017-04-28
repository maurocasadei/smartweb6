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
	$f = new Fields;$f->setFieldDbNameAndValue("al_ordine");$f->setTipo("number");
  $arCampiNoMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("al_immagine");$f->setTipo("image");
  $f->setImage_big_destination_folder("immagini/album/big/");$f->setImage_big_size_width(1200);$f->setImage_big_size_height(600); 
  $f->setImage_medium_destination_folder("immagini/album/medium/");$f->setImage_medium_size_width(800);$f->setImage_medium_size_height(600);    
  $f->setThumbnail_crop1_destination_folder("immagini/album/crop1/");$f->setThumbnail_crop1_size_width(450);$f->setThumbnail_crop1_size_height(250);    
  $f->setThumbnail_crop2_destination_folder("immagini/album/crop2/");$f->setThumbnail_crop2_size_width(350);$f->setThumbnail_crop2_size_height(180);   
  $arCampiNoMultilingua[]=$f;

  $arCampiSiMultilingua=array();
	$f = new Fields;$f->setFieldDbNameAndValue("al_nome");$f->setTipo("text");
  $arCampiSiMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("al_description");$f->setTipo("textarea");
  $arCampiSiMultilingua[]=$f;
	$f = new Fields;$f->setFieldDbNameAndValue("al_testo");$f->setTipo("editor");
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
	<form id="data-form<?php echo $ssfieldattruniqueform?>" data-toggle="validator" method="POST" action="#" enctype="multipart/form-data"  sect="<?php echo $sect; ?>" lev="<?php echo $lev; ?>">
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue($campoID);$f->setLabel($campoID);$f->setTipo("text");$f->setReadonly("readonly");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("al_ordine");$f->setLabel("Ordine");$f->setTipo("number");$f->setRequired("required");
					createFields($f,$r);
			?>
		</div>
		<div class="form-group col-md-4">
			<?php
					$f = new Fields;$f->setFieldDbNameAndValue("al_immagine");$f->setLabel("Copertina");$f->setTipo("image");
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
					$r_data=null;  $active="";
					$db->where ($campoID, $r[$campoID]);
					$db->where ("{$prefix}language", $key);
					$result_data=$db->get ("{$nometabella}_data d");
					if ($db->count > 0) {
						$r_data=$result_data[0];
					}
				echo "<div class=\"form-group col-md-6\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}al_nome");$f->setFieldDbValue("al_nome");$f->setLabel("Nome Album");$f->setTipo("text");
					createFields($f,$r_data);
				echo "</div>";

				echo "<div class=\"form-group col-md-6\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}al_description");$f->setFieldDbValue("al_description");$f->setLabel("Description");$f->setTipo("textarea");
					createFields($f,$r_data);
				echo "</div>";

				echo "<div class=\"form-group col-md-12\">";
					$f = new Fields;$f->setFieldDbName("{$config["langseparator"]}{$key}{$config["langseparator"]}al_testo");$f->setFieldDbValue("al_testo");$f->setLabel("Testo");$f->setTipo("editor");
					createFields($f,$r_data);
				echo "</div>";					echo <<<MORELINE
					</div>
				</div>
MORELINE;
					}
				?>
			</div>
		</div>
		<!-- #############     SOTTOTABELLA     ############## -->
		<!-- ########################################### -->

		<div class="form-group">
			<div class="header-title">
					<h1><?php printLabel($config["lang"],"albumtitolo2"); ?></h1>
			</div>
			<?php
				if (in_update()){
					global $IDForeignkey;
					$IDForeignkey=$r[$campoID];
				//	var_dump($IDForeignkey);
					include_once("listsubalbumfoto.php");
				}else{
					printLabel($config["lang"],"albumfotomsg");
				}
			?>
		</div>
		<div class="form-group col-md-12">
      <?php $suffixtable="";if (isset($_GET["suffixtable"])){$suffixtable=$_GET["suffixtable"];}?>
			<button ssfieldattruniqueform="<?php echo $ssfieldattruniqueform?>" suffixtable="<?php echo $suffixtable?>" type="button" tipo="salva" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i><?php printLabel($config["lang"],"comandos"); ?></button>
		</div>
 	</form> <!-- Importante il form deve includere il salva, altrimenti il js non prende il form corretto-->
    
   <br>

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
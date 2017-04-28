<?php
include_once ($config["internalurlfront"]."classes/frontClass.php");
include_once ($config["internalurlfront"]."funzioni.php");
$meta=new Meta();
$arRoot=array(
	"prodotti"=>"prodotti.php",
	"news"=>"newslist.php",
	"newsdett"=>"newsdett.php",
);
function rootView(){
	global $db,$config,$arRoot,$meta;
//	print  dirname(__FILE__);
	//print $_SERVER["DOCUMENT_ROOT"];
	$pagename="homepage.php";$lang=$config["languagedefault"];$ID=0;$key="";
	$PathREQUEST_URI = parse_url($_SERVER["REQUEST_URI"]);
	//var_dump($PathREQUEST_URI);
	$keyToFind=explode("/",$PathREQUEST_URI["path"]);
	$langYes=$config["langYes"];
	$keyToFind = array_diff($keyToFind,array("",$config["subfolder"])); //rimuovo gli elementi vuoti
	$arValues=array();
	foreach (array_values($keyToFind) as $value) {
    $badWords = array("/ union /i","/ drop /i","/--/i","/--union/i","/union--/i");
    $arValues[]=preg_replace($badWords, "", $value);
  }
	if (is_array($arValues) && ((count($arValues)>0 && !$langYes) || (count($arValues)>1 && $langYes))){
		//se è presente la lingua
		if ($langYes){
			if (isset($arValues[2]))$ID=$arValues[2];
			if (isset($arValues[1]))$key=$arValues[1];
			if (isset($arValues[0]))$lang=$arValues[0];
		}else{
			if (isset($arValues[1]))$ID=$arValues[1];
			if (isset($arValues[0]))$key=$arValues[0];
		}
		if (isset($arRoot[$key])){
			$pagename=$arRoot[$key];
		}else{
			//è una pagina?
			$nometabella="contenuto";$campoID="cn_IDContenuto";$prefix="cn_";
			$db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
			$db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $lang);
			$db->where ("d.cn_slug", $key);
			$db->where ("p.cn_visibile", 1);
			$result=$db->get ("{$nometabella} p");
			if ($db->count > 0) {
				foreach ($result as $r) {
					$ID=$r["cn_IDContenuto"];
					$pagename="pagina.php";
				}
			}
		}
	}
	settype($ID, "integer"); // controllo l'ID e lo normalizzo
	//var_dump($pagename);
	//print $pagename."-".$lang;//die;
	$meta->Pagename=$pagename;
	$meta->ActualRoot=$key;
	$meta->ActualLang=$lang;
	$meta->ID=$ID;
}
?>

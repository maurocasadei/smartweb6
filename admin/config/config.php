<?php
$subfolder="smartweb6";
$config=array(
	"lang"=>"it",
	"db_hostname"=>"localhost",
	"db_username"=>"admin",
	"db_password"=>"admin",
	"db_database"=>"smartweb6",
	"developer"=>"Soluzione Software s.r.l.",
	"logo"=>"iconslogo.png",
	"logoadmin"=>"qpc-logo.svg",
	"version"=>"6.0",
	"siteurl"=>"http://localhost:81/$subfolder/",
	"internalurladmin"=>"admin/",
	"internalurlfront"=>"front/",
	"internalcomposerurl"=>"localhost:81/$subfolder/immagini/",
	"language"=>array("it"=>"Italiano","en"=>"Inglese","fr"=>"Francese"),
	"languageprimary"=>"it", // lingua admin
	"langseparator"=>"-",
	"subfolder"=>$subfolder,
	"langYes"=>true, // fa apparire la cartella lingue
	"languagedefault"=>"it", // lingua front
	"folderpdf"=>"allegati/pdf",
	"includepathadmin"=>$_SERVER['DOCUMENT_ROOT']."/".$subfolder."/admin/",
	"multilanguage"=>true, // lingua admin
);
?>

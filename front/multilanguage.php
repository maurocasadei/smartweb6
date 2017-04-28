<?php 
$arrLabel=array();
createLabel("en","l0","Login");
createLabel("en","l1","Your unique username to app");
createLabel("en","l2","Username");
createLabel("en","l3","Please enter you username");
createLabel("en","l4","Your strong password");
createLabel("en","l5","Password");
createLabel("en","l6","Please enter you password");
createLabel("en","l7","Login");
createLabel("en","protect","Violazione di Azione");
createLabel("en","lok","Access successful");
createLabel("en","lko","Access proibited");
createLabel("en","dashboard","Smartweb 6.0");
createLabel("en","menu1","Menu");
createLabel("en","menu2","Operatori");
createLabel("en","list1","Comandi");
createLabel("en","operatorititolo","Gestione Operatori");
createLabel("en","operatorisottotitolo","Procedura per Inserire, Modificare, Cancellare Operatori");
createLabel("en","comandou","Update");
createLabel("en","comandod","Delete");
createLabel("en","comandoi","Insert");
createLabel("en","comandos","Save");
createLabel("en","comandonomove","Blocca/Sblocca Spostamenti");
createLabel("en","updOk","Aggiornamento avvenuto con successo");
createLabel("en","insOk","Inserimento avvenuto con successo");
createLabel("en","remOk","Cancellazione avvenuta con successo");
createLabel("en","news1","News");
createLabel("en","newstitolo","Gestione News");
createLabel("en","newssottotitolo","Procedura per Inserire, Modificare, Cancellare News");
createLabel("en","menu1","Menu");
createLabel("en","menutitolo","Gestione Menù");
createLabel("en","menusottotitolo","Procedura per Inserire, Modificare, Cancellare Menù");
createLabel("en","contenutotitolo","Gestione Pagine");
createLabel("en","contenutosottotitolo","Procedura per Inserire, Modificare, Cancellare Pagine");
createLabel("en","pagine1","Pagine");
createLabel("en","filemanager1","Media e File");
createLabel("en","filemanagertitolo","Gestione File");
createLabel("en","filemanagersottotitolo","Procedura per Inserire, Modificare, Cancellare File e Media");
function createLabel($Lang,$Key,$Label){
	global $arrLabel;
	$l=new Label;$l->setKey($Key);$l->setLabel($Label);$l->setLang($Lang);array_push($arrLabel,$l);
}
class Label {    
   public $Key;
   public $Label;
   public $Lang;
   
   public function setKey($campo) {
		$this->Key = $campo;
	}
	public function setLabel($campo) {
		$this->Label = $campo;
	}
	public function setLang($campo) {
		$this->Lang = $campo;
	}
}
function findLabel($lang,$key){
	global $arrLabel;
	$item="not found label";
	foreach($arrLabel as $Label) {
		if ($key == $Label->Key && $lang==$Label->Lang) {
			$item = $Label->Label;
			break;
		}
	}
	return $item;
}
function printLabel($lang,$key){
	global $arrLabel;
	$item="not found label";
	foreach($arrLabel as $Label) {
		if ($key == $Label->Key && $lang==$Label->Lang) {
			$item = $Label->Label;
			break;
		}
	}
	echo $item;
}
?>
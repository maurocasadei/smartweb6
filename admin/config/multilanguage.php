<?php
$arrLabel=array();
createLabel("it","l0","Login");
createLabel("it","l1","Your unique username to app");
createLabel("it","l2","Username");
createLabel("it","l3","Inserire il tuo username");
createLabel("it","l4","Your strong password");
createLabel("it","l5","Password");
createLabel("it","l6","Inserire la tua Password password");
createLabel("it","l7","Accedi");
createLabel("it","l8","Ricordami");
createLabel("it","l9","Cerca...");
createLabel("it","protect","Violazione di Azione");
createLabel("it","lok","Accesso Eseguito");
createLabel("it","lko","Accesso Negato");
createLabel("it","dashboard","Smartweb 6.0");
createLabel("it","list1","Comandi");
createLabel("it","operatorititolo","Gestione Operatori");
createLabel("it","operatorisottotitolo","Procedura per Inserire, Modificare, Cancellare Operatori");
createLabel("it","comandou","Modifica");
createLabel("it","comandod","Cancella");
createLabel("it","comandoi","Inserisci");
createLabel("it","comandos","Salva");
createLabel("it","comandor","Ricerca");
createLabel("it","comandoa","Aggiorna");
createLabel("it","comandoass","Assegna");
createLabel("it","updOk","Aggiornamento avvenuto con successo");
createLabel("it","insOk","Inserimento avvenuto con successo");
createLabel("it","remOk","Cancellazione avvenuta con successo");
createLabel("it","updKo","Errore in Aggiornamento");
createLabel("it","insKo","Errore in Inserimento");
createLabel("it","remKo","Errore in Cancellazione");
createLabel("it","news1","News");
createLabel("it","album1","Album Fotografici");
createLabel("it","newstitolo","Gestione News");
createLabel("it","newssottotitolo","Procedura per Inserire, Modificare, Cancellare News");
createLabel("it","menutitolo","Gestione Menù");
createLabel("it","menusottotitolo","Procedura per Inserire, Modificare, Cancellare Menù");
createLabel("it","contenutotitolo","Gestione Pagine");
createLabel("it","contenutosottotitolo","Procedura per Inserire, Modificare, Cancellare Pagine");
createLabel("it","pagine1","Pagine");
createLabel("it","filemanager1","Media e File");
createLabel("it","filemanagertitolo","Gestione File");
createLabel("it","filemanagersottotitolo","Procedura per Inserire, Modificare, Cancellare File e Media");
createLabel("it","albumtitolo","Gestione Album Fotografici");
createLabel("it","albumsottotitolo","Procedura per Inserire, Modificare, Cancellare Album Fotografici");
createLabel("it","albumfotomsg","Per Inserire Foto Occorre salvare l'album");
createLabel("it","albumtitolo2","Foto dell'album");
createLabel("it","albumfototitolo","Foto di Album Fotografico");
createLabel("it","albumfotosottotitolo","Procedura per Inserire, Modificare, Cancellare Foto di Album Fotografici");
createLabel("it","menu2","Menù");
createLabel("it","menu1","Operatori");
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

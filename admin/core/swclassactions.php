	<?php
$arrActions=array();
include_once("swrootaction.inc.php");

class action {    
   public $Sect;
   public $Folder;
   public $ArrSubAction;
   
   public function setSect($campo) {
		$this->Sect = $campo;
	}
	public function setFolder($campo) {
		$this->Folder = $campo;
	}
	public function setArrSubAction($campo) {
		$this->ArrSubAction = $campo;
	}
}
class subaction{
   public $Page;
   public $Lev;
   
   public function setPage($campo) {
		$this->Page = $campo;
	}
	public function setLev($campo) {
		$this->Lev = $campo;
	}
}
function findSubActionByLev($arrSubActions,$val){
	$item=new subaction;
	foreach($arrSubActions as $subaction) {
		if ($val == $subaction->Lev) {
			$item = $subaction;
			break;
		}
	}
	return $item;
}
function findActionBySect($val){
	global $arrActions;
	$item=new action;
	foreach($arrActions as $action) {
		//var_dump($action);
		if ($val == $action->Sect) {
			$item = $action;
			break;
		}
	}
	return $item;
}
?>
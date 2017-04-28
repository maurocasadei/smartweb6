<?php
/*inizio login*/
$arrSubActions=array();
$action = new action;
$action->setSect("login");
$action->setFolder("login");
$subaction = new subaction;$subaction->setLev("dv");$subaction->setPage("dv.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("chk");$subaction->setPage("chk.php");
array_push($arrSubActions,$subaction);
$action->setArrSubAction($arrSubActions);
array_push($arrActions,$action);
/*fine login*/

/*inizio dashboard*/
$arrSubActions=array();
$action = new action;
$action->setSect("dashboard");
$action->setFolder("dashboard");
$subaction = new subaction;$subaction->setLev("dv");$subaction->setPage("dashboard.php");
array_push($arrSubActions,$subaction);
	//set subaction
$action->setArrSubAction($arrSubActions);
array_push($arrActions,$action);
/*fine login*/

/*inizio sitemap*/
$arrSubActions=array();
$action = new action;
$action->setSect("sitemap");
$action->setFolder("sitemap");
$subaction = new subaction;$subaction->setLev("create");$subaction->setPage("sitemap.php");
array_push($arrSubActions,$subaction);
$action->setArrSubAction($arrSubActions);
array_push($arrActions,$action);
/*fine sitemap*/


/*inizio operatori*/
$arrSubActions=array();
$action = new action;
$action->setSect("operatori");
$action->setFolder("operatori");
$action->setArrSubAction(regularList());
array_push($arrActions,$action);
/*fine operatori*/

/*inizio news*/
$arrSubActions=array();
$action = new action;
$action->setSect("news");
$action->setFolder("news");
$action->setArrSubAction(regularList());
array_push($arrActions,$action);
/*fine news*/

/*inizio menu*/
$arrSubActions=array();
$action = new action;
$action->setSect("menu");
$action->setFolder("menu");
$subaction = new subaction;$subaction->setLev("list");$subaction->setPage("listmenu.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("updmenu");$subaction->setPage("dett.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("ins");$subaction->setPage("dett.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("addmenu");$subaction->setPage("dett.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("rem");$subaction->setPage("dett.php");
array_push($arrSubActions,$subaction);
	//set subaction
$action->setArrSubAction($arrSubActions);
array_push($arrActions,$action);
/*fine menu*/
//var_dump($arrActions);

/*inizio pagine*/
$action = new action;
$action->setSect("pagine");
$action->setFolder("pagine");
$action->setArrSubAction(regularList());
array_push($arrActions,$action);
/*fine pagine*/

/*inizio filemanager*/
$arrSubActions=array();
$action = new action;
$action->setSect("filemanager");
$action->setFolder("filemanager");
$subaction = new subaction;$subaction->setLev("dialog");$subaction->setPage("filemanager.php");
array_push($arrSubActions,$subaction);
	//set subaction
$action->setArrSubAction($arrSubActions);
array_push($arrActions,$action);
/*fine filemanager*/

/*inizio album*/
$arrSubActions=array();
$action = new action;
$action->setSect("album");
$action->setFolder("album");
$action->setArrSubAction(regularList());
array_push($arrActions,$action);
/*fine album*/
/*inizio albumfoto listbub*/
$arrSubActions=array();
$action = new action;
$action->setSect("albumfoto");
$action->setFolder("album");
$subaction = new subaction;$subaction->setLev("list");$subaction->setPage("dett.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("upd");$subaction->setPage("dettlistsubalbumfoto.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("ins");$subaction->setPage("dettlistsubalbumfoto.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("rem");$subaction->setPage("dettlistsubalbumfoto.php");
array_push($arrSubActions,$subaction);
$subaction = new subaction;$subaction->setLev("refresh");$subaction->setPage("listsubalbumfoto.php");
array_push($arrSubActions,$subaction);
$action->setArrSubAction($arrSubActions);
array_push($arrActions,$action);
/*fine albumfoto*/

function regularList(){
	$arrSubActions=array();
	$subaction = new subaction;$subaction->setLev("list");$subaction->setPage("list.php");
	array_push($arrSubActions,$subaction);
	$subaction = new subaction;$subaction->setLev("upd");$subaction->setPage("dett.php");
	array_push($arrSubActions,$subaction);
	$subaction = new subaction;$subaction->setLev("ins");$subaction->setPage("dett.php");
	array_push($arrSubActions,$subaction);
	$subaction = new subaction;$subaction->setLev("rem");$subaction->setPage("dett.php");
	array_push($arrSubActions,$subaction);
	$subaction = new subaction;$subaction->setLev("refresh");$subaction->setPage("list.php");
	array_push($arrSubActions,$subaction);
	return $arrSubActions;
}
?>

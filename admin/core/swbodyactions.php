	<?php
	//controlla il tipo di action e decide che pagina chiamare
	//i parametri sono
	//sect=sezione
		//determina la gestione
	//lev=livello
		//lv=visualizzazione lista
		//dv=visualizzazione dettaglio
		//dm=modifica dettaglio
		//di=inserisci dettaglio
		//de=elimina dettaglio
	if (isset($_SESSION["logged"]) && $_SESSION["logged"]){
		if (isset($_GET["sect"])){$sect=$_GET["sect"];}else{$sect="dashboard";}
		if (isset($_GET["lev"])){$lev=$_GET["lev"];}else{$lev="dv";}
	}else{
		$sect="login";
		if (isset($_GET["lev"])){$lev=$_GET["lev"];}else{$lev="dv";}
	}
	$action=findActionBySect($sect);
	//print$sect;die;
	//var_dump($action->ArrSubAction);
	if (is_array($action->ArrSubAction)){
		$subaction=findSubActionByLev($action->ArrSubAction,$lev);
		$page=$subaction->Page;
	}else{
		$page="nf";
	}
	?>
    <body sect="<?php echo $sect; ?>" lev="<?php echo $lev; ?>">
	<?php
	//print $action->Folder."/".$page;die;
		if (is_file($action->Folder."/".$page)){
			//print $action->Folder."/".$page;die;
        //error_log($action->Folder."/".$page);

			include_once($action->Folder."/".$page);
		}else{
			include_once("protect/protect.php");
			echo "<meta http-equiv=\"Refresh\" content=\"2; url=index.php\">";
		}
		include_once("core/swlinkendbody.php");
	?>
    </body>

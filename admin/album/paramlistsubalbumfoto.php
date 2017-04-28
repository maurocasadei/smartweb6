<?php
	global $sectSublist;
	$titolo="albumfototitolo";
	$sottotitolo="albumfotosottotitolo";
	$nometabella="albumfoto";
	$campoID="af_IDAlbumfoto";
	$prefix="af_";
	$campoorderby="af_ordine";
	$nomeforeignkey="af_IDAlbum";
	$sectSublist="albumfoto";
  $sect=$sectSublist;
	/*per ritornare al dettaglio dopo la modifica o l'inserimento o la cancellazione*/
	$linktocomeback="index.php?sect=album&lev=upd&al_IDAlbum=|FOREIGNKEYTOCOMEBACK|";
  $insertmodal=true;
?>

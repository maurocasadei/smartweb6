<?php
class Fields {    
	public $Label; //l'etichetta del campo
	public $FieldDbName;  // è il nome del campo in tabella
	public $FieldDbValue; // è il nome del campo in tabella da cui prendere il valore - di solito = al FieldDbName, diverso in caso si voglia impostare un valore differente in input come ad esempio conferma password
	public $Tipo="text"; //il type impostato nell input type=
	public $Required=""; // se richiesto
	public $Readonly=""; // se in sola lettura
	public $PropertyAdd=""; // un testo da impostare all'nterno dell'input
	public $arLabelValue=array(); // se radio
	public $FieldInLanguage=false; // se true cerca il dato tra i campi in lingua
	public $DefaultValue=""; // nella select imposta un valore di default in caso di insert
	public $Image_big_destination_folder=""; // serve per il salva e per le immagini
	public $Image_medium_destination_folder=""; // serve per il salva e per le immagini
	public $Thumbnail_crop1_destination_folder=""; // serve per il salva e per le immagini
	public $Thumbnail_crop2_destination_folder=""; // serve per il salva e per le immagini
	public $Image_big_size_width=""; // serve per il salva e per le immagini
	public $Image_big_size_height=""; // serve per il salva e per le immagini
	public $Image_medium_size_width=""; // serve per il salva e per le immagini
	public $Image_medium_size_height=""; // serve per il salva e per le immagini
	public $Thumbnail_crop1_size_width=""; // serve per il salva e per le immagini
	public $Thumbnail_crop1_size_height=""; // serve per il salva e per le immagini
	public $Thumbnail_crop2_size_width=""; // serve per il salva e per le immagini
	public $Thumbnail_crop2_size_height=""; // serve per il salva e per le immagini
	public $Immaginesrc=""; // serve per il salva e per le immagini
	public $Lev=""; //serve nel tipo "button" per aprire in modalità dialog bootstrap
	public $Sect=""; //serve nel tipo "button" per aprire in modalità dialog bootstrap
	public $CampoDaAssegnare=""; //serve nel caso di richiamo di una lista modale per passare al pulsante di tipo aprilistamodale l'id del campo in cui ritornare il valore selezionato mediante la pressione di "assegna " nella lista""
	public function setImage_big_destination_folder($campo) {
		$this->Image_big_destination_folder = $campo;
	}
	public function setImage_medium_destination_folder($campo) {
		$this->Image_medium_destination_folder = $campo;
	}
	public function setThumbnail_crop1_destination_folder($campo) {
		$this->Thumbnail_crop1_destination_folder = $campo;
	}
	public function setThumbnail_crop2_destination_folder($campo) {
		$this->Thumbnail_crop2_destination_folder = $campo;
	}
	public function setImage_big_size_width($campo) {
		$this->Image_big_size_width = $campo;
	}
	public function setImage_big_size_height($campo) {
		$this->Image_big_size_height = $campo;
	}
	public function setImage_medium_size_width($campo) {
		$this->Image_medium_size_width = $campo;
	}
	public function setImage_medium_size_height($campo) {
		$this->Image_medium_size_height = $campo;
	}
	public function setThumbnail_crop1_size_width($campo) {
		$this->Thumbnail_crop1_size_width = $campo;
	}
	public function setThumbnail_crop1_size_height($campo) {
		$this->Thumbnail_crop1_size_height = $campo;
	}
	public function setThumbnail_crop2_size_width($campo) {
		$this->Thumbnail_crop2_size_width = $campo;
	}
	public function setThumbnail_crop2_size_height($campo) {
		$this->Thumbnail_crop2_size_height = $campo;
	}
  

	public function setCampoDaAssegnare($campo) {
		$this->CampoDaAssegnare = $campo;
	}
	public function setLev($campo) {
		$this->Lev = $campo;
	}
	public function setSect($campo) {
		$this->Sect = $campo;
	}
	public function setImmaginesrc($campo) {
		$this->Immaginesrc = $campo;
	}
	public function setLabel($campo) {
		$this->Label = $campo;
	}
	public function setFieldDbNameAndValue($campo) {
		$this->FieldDbName = $campo;
		$this->FieldDbValue = $campo;
	}
	public function setFieldDbName($campo) {
		$this->FieldDbName = $campo;
	}
	public function setFieldDbValue($campo) {
		$this->FieldDbValue = $campo;
	}
	public function setTipo($campo) {
		$this->Tipo = $campo;
	}
	public function setRequired($campo) {
		$this->Required = $campo;
	}
	public function setReadonly($campo) {
		$this->Readonly = $campo;
	}
	public function setPropertyAdd($campo) {
		$this->PropertyAdd = $campo;
	}
	public function setarLabelValue($campo) {
		$this->arLabelValue = $campo;
	}
	public function setFieldInLanguage($campo) {
		$this->FieldInLanguage = $campo;
	}
	public function setDefaultValue($campo) {
		$this->DefaultValue = $campo;
	}
}
class LabelValue {    
	//utilizata pper le scelte dei radio button
	public $Label=""; 
	public $Value=""; 	
	public $Selected=""; 	
	public function setLabel($campo) {
		$this->Label = $campo;
	}
	public function setLabelAndValue($campo) {
		$this->Label = $campo;
		$this->Value = $campo;
	}
	public function setValue($campo) {
		$this->Value = $campo;
	}
	public function setSelected($campo) {
		$this->Selected = $campo;
	}
}

?>
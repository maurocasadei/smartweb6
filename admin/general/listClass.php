<?php
class Column {    
	public $Label;
	public $Field;
	public $Tipo="text";
	public $Width="150";
	public $Height="150";
	public $Modal=false; //serve per identificare se un comando deve andare in modale
	public $Lev=""; //serve nel tipo "button" per aprire in modalità dialog bootstrap
	public $Sect=""; //serve nel tipo "button" per aprire in modalità dialog bootstrap
	public $Suffix=""; //serve per identificare gli oggetti di un particolare form
	public $NomeCampoDaAssegnare=""; //è il nome del campo da assegnare (text) della select

	public function setNomeCampoDaAssegnare($campo) {
		$this->NomeCampoDaAssegnare = $campo;
	}
	public function setLabel($campo) {
		$this->Label = $campo;
	}
	public function setField($campo) {
		$this->Field = $campo;
	}
	public function setTipo($campo) {
		$this->Tipo = $campo;
	}
	public function setWidth($campo) {
		$this->Width = $campo;
	}
	public function setHeight($campo) {
		$this->Height = $campo;
	}
	public function setModal($campo) {
		$this->Modal = $campo;
	}
	public function setLev($campo) {
		$this->Lev = $campo;
	}
	public function setSect($campo) {
		$this->Sect = $campo;
	}  
	public function setSuffix($campo) {
		$this->Suffix = $campo;
	}
}
?>
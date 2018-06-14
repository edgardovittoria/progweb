<?php

class EPosto {

	public $fila;
	public $posto;
        public $disp;

	public function __construct($fila,$posto,$disp = true) {
		$this->fila = $fila;
		$this->posto = $posto;
                $this->disp = $disp;
	}

	public function getFila() {
		return $this->fila;
	}
	public function getPosto() {
		return $this->posto;
	}
	public function setFila($fila) {
		$this->fila = $fila;
	}
	public function setPosto($posto) {
		$this->posto = $posto;
	}
}
<?php

class Cargo{
      private $idCargo;
      private $descripcion;

	public function __construct() {


	}

	public function getIdCargo() {
		return $this->idCargo;
	}

	public function setIdCargo($value) {
		$this->idCargo = $value;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($value) {
		$this->descripcion = $value;
	}
}
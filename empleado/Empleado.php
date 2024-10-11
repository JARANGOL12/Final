<?php
class Empleado{
    private $idEmpleado;
    private $idPersona;
    private $idCargo;
    private $CodEmpleado;
    private $fechaIngreso;
    private $salario;

public function __construct( ){}

	public function getIdEmpleado() {
		return $this->idEmpleado;
	}

	public function setIdEmpleado($value) {
		$this->idEmpleado = $value;
	}

	public function getIdPersona() {
		return $this->idPersona;
	}

	public function setIdPersona($value) {
		$this->idPersona = $value;
	}

	public function getIdCargo() {
		return $this->idCargo;
	}

	public function setIdCargo($value) {
		$this->idCargo = $value;
	}

	public function getCodEmpleado() {
		return $this->CodEmpleado;
	}

	public function setCodEmpleado($value) {
		$this->CodEmpleado = $value;
	}

	public function getFechaIngreso() {
		return $this->fechaIngreso;
	}

	public function setFechaIngreso($value) {
		$this->fechaIngreso = $value;
	}

	public function getSalario() {
		return $this->salario;
	}

	public function setSalario($value) {
		$this->salario = $value;
	}
}
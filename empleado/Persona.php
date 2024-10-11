<?php


class Persona{
    private $idPersona;
    private $dni;
    private $nombre;
    private $apellido;
    private $edad;

    public function __construct( ){}

	public function getIdPersona() {
		return $this->idPersona;
	}

	public function setIdPersona($value) {
		$this->idPersona = $value;
	}

	public function getDni() {
		return $this->dni;
	}

	public function setDni($value) {
		$this->dni = $value;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($value) {
		$this->nombre = $value;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function setApellido($value) {
		$this->apellido = $value;
	}

	public function getEdad() {
		return $this->edad;
	}

	public function setEdad($value) {
		$this->edad = $value;
	}
}